<?php ob_start(); ?>
<?php
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 525px;
        }

        .table th {
            padding: 0px;
        }

        .table td {
            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "../../inc/koneksi.php";
    $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data transaksi
        $query = "SELECT * FROM tb_naik_gaji";
        $label = "Semua Data Pegawai Naik Gaji";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "SELECT * FROM tb_naik_gaji WHERE (new_naik_gaji BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "')";
        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
        $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
    }
    ?>
    <img src="../assets/images/download.jfif" align=left height="110" width="110">
    <p style=" margin-left:50px; font-size:30px;  margin-top: 10px;">
    <b>PEMERINTAH KOTA BANJARMASIN <br>DINAS PENDIDIKAN</b>
    </p>
    <span style="margin-right: 120px;">Alamat : Jl. Kapten Piere Tendean No.29, Gadang, Kec. Banjarmasin Tengah Kalimantan Selatan 70231</span>
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA PEGAWAI NAIK GAJI</h3>
    
    <hr>
    <br>
    <table class="table " border="1" style="margin-top: 10px; margin-left: 60px; text-align:center;">
        <tr>
            <th>No</th>
            <th>Nip</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tmt</th>
            <th>Unit Organisasi</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['nip'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['jeniskelamin'] . "</td>";
                // echo "<td>" . $data['alamat'] . "</td>";
                echo "<td>" . tgl_indo($data['tmt']) . "</td>";
                echo "<td>" . $data['unit'] . "</td>";
                // echo "<td>" . date('d-M-Y', strtotime($data['new_pegawai'])) . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();

require '../assets/libraries/html2pdf/autoload.php';
ob_end_clean();
$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
$pdf->WriteHTML($html);
ob_end_clean();
$pdf->Output('data-naik-gaji.pdf', 'I');
?>