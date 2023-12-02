<?php ob_start(); ?>

<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th {
            padding: 5px;
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
    include "koneksi.php";
    $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data transaksi
        $query = "select tb_data_gaji.*, tb_pegawai.id_pegawai, tb_pegawai.nama, tb_pegawai.nip from tb_data_gaji
        inner join tb_pegawai on tb_data_gaji.id_pegawai = tb_pegawai.id_pegawai ORDER BY nip DESC";

        $label = "Semua Data Aktivitas pegawai";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "select tb_data_gaji.*, tb_pegawai.id_pegawai, tb_pegawai.nama, tb_pegawai.nip from tb_data_gaji
        inner join tb_pegawai on tb_data_gaji.id_pegawai = tb_pegawai.id_pegawai WHERE (tgl BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "')";

        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
        $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
    }
    ?>

    <img src="../assets/images/mahesa2.png" align=left height="150" width="150">

    <P style="font-size: 50px; margin-left: 450px;  font-weight: bold;"> DINAS PENDIDIKAN</P>

    <p style="margin-left:300px; font-size: 20px;">Alamat : JL.Nangka, Kota Banjarbaru, Kalimantan Selatan,Indonesia</p>
    <hr>
    <h3 style="text-align:center; margin-top: 20px;">LAPORAN DATA GAJI</h3>
    <span style="margin-left: 520px;"><?php echo $label ?></span>

    <hr>
    <table class="table" width="670" border="1" style="margin-top: 10px; text-align:center;">
        <tr>
    	<th>No</th>	
						<th>Nama </th>
						<th>nip</th>
                        <th>Tmt</th>
						<th>Masa Kerja Golongan</th>
						<th>Gaji Lama</th>
						<th>Gaji Baru</th>

        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['nip'] . "</td>";
                echo "<td>" . $data['tmt'] . "</td>";
                echo "<td>" . $data['masakerja'] . "</td>";
                // echo "<td>" . $data['alamat'] . "</td>";
                echo "<td>" . $data['gajilama'] . "</td>";
                // echo "<td>" . date('d-M-Y', strtotime($data['new_pegawai'])) . "</td>";
                echo "<td>" . $data['gajibaru'] . "</td>";
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
$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'F4', 'en');
$pdf->WriteHTML($html);
ob_end_clean();
$pdf->Output('riwayatkp.pdf', 'I');
?>