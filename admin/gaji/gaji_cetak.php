<?php 
include "../../inc/koneksi.php";
include "../../inc/rupiah.php";

$sql = "SELECT * FROM tb_data_gaji order by nip asc";                     
$query = mysqli_query($koneksi,$sql);

$dinas = mysqli_query($koneksi, "SELECT * FROM tb_profil");
$data_dinas = mysqli_fetch_array($dinas,MYSQLI_BOTH);
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>PENGELOLAAN DATA KGB</title>
    
      <link rel="shortcut icon" href="../../dist/img/dinas.png">
</head>

<body>
    <img src="../../dist/img/dinas.png" align="left" width="85">
    <p align="center"><b>
            <center>
            <font size="5"><?php echo $data_dinas['nama_pemerintahan'];?></font> <br>
			<font size="6"><?php echo $data_dinas['nama_dinas'];?></font> <br>
            <font size="2"><?php echo $data_dinas['alamat'];?></font> <br>
            <hr size="2px" color="black">
            </center>
        </b></p>

    <h3>
        <center>
            LAPORAN DATA GAJI<br>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                            <th style="text-align: center; font-size: 18px;">No</th>
                            <th style="text-align: center; font-size: 18px;">Nama</th>
                            <th style="text-align: center; font-size: 18px;">NIP</th>
                            <th style="text-align: center; font-size: 18px;">TMT</th>
                            <th style="text-align: center; font-size: 18px;">MKG</th>
                            <th style="text-align: center; font-size: 18px;">Pangkat/Gol</th>
                            <th style="text-align: center; font-size: 18px;">Gaji Lama</th>
                            <th style="text-align: center; font-size: 18px;">Gaji Baru</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                         $no = 0;
                         while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                            $no++;
                        ?>
                            <tr>          
                                <td align="center"><?php echo $no;?></td>
                                <td align="center"><?php echo $data['nama']; ?></td>
                                <td align="center"><?php echo $data['nip']; ?></td>
                                <td align="center"><?php echo  tgl_indo($data['tmt']); ?></td>
                                <td align="center"><?php echo $data['masakerja']; ?> Tahun</td>
                                <td align="center"><?php echo $data['pangkat']; ?> / <?php echo $data['golongan']; ?></td>
                                <td align="center"><?php echo rupiah($data['gaji_before']); ?></td>
                                <td align="center"><?php echo rupiah($data['gaji_now']); ?></td>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>
    <br>
    <div style="text-align: left; display: inline-block; float: right;">
        <h5>
            Banjarmasin, <?php echo tgl_indo(date('Y-m-d')); ?>
            <br>MENGETAHUI,<br>
            <br>GUBERNUR KALIMANTAN SELATAN
            <br>KEPALA DINAS PENDIDIKAN BANJARMASIN
            <br>PROVINSI KALIMANTAN SELATAN
            <br><br>
                <img src="../../dist/img/ttd.png" align="left" width="85">
            <br><br><br><br><br><br>
			<U><ins>Nuryadi, S.Pd.,MA</ins><br></U>
            <U>NIP. 19670413198804 1 004<br></U>
        </h5>

    </div>


</body>

</html>