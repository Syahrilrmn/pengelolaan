<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
	$data_pass = $_SESSION['ses_password'];
}
//KONEKSI DB
include "../../inc/koneksi.php";
include "../../inc/rupiah.php";
include "../../inc/tglindo.php";
include "../../inc/terbilang.php";

if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_kgb where id_kgb='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
$dinas = mysqli_query($koneksi, "SELECT * FROM tb_profil");
$data_dinas = mysqli_fetch_array($dinas,MYSQLI_BOTH);
?>
<html><head>
<style type="text/css">
	
th{
	height: 20
}


</style>
	

	<title>PENGELOLAAN DATA KGB</title>
	<link rel="icon" href="../../dist/img/dinas.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Gaji Berkala</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300&amp;display=swap" rel="stylesheet">
	<script>
		window.print();
	</script>
</head>
<body>
<img src="../../dist/img/dinas-removebg-preview.png" align="left" width="80">
    <p align="center" style="" cellpadding="0"><b>
            <center>
            <font size="5"><?php echo $data_dinas['nama_pemerintahan'];?></font> <br>
			<font size="6"><?php echo $data_dinas['nama_dinas'];?></font> <br> </b>
            <font size="2"><?php echo $data_dinas['alamat'];?></font> <br>
            <hr size="2px" color="black">
            </center>
    </p>
<form>
	<table  padding-top="10px" height="5px" border="0">
	<tbody>		
		<tr> 
			<td width="50px">Nomor</td>
			<td width="20px">:</td>
			<td width="310px"><?php echo $data_cek['no_surat']; ?></td>
			<td><p align="right">Banjarmasin, <?php echo tgl_indo($data_cek['tanggal_surat']); ?></p></td>
		</tr>
		<tr> 
			<td>Sifat</td>
			<td>:</td>
			<td width="310px">Penting</td>
		</tr>
		<tr> 
			<td>Lampiran</td>
			<td>:</td>
			<td>1 (satu) berkas</td>
		</tr>
		<tr> 
			<td width="50px">Perihal</td>
			<td width="20px">:</td>
			<td>KENAIKAN GAJI BERKALA</td>
		</tr>
		<tr>
			<td width="50px"></td>
			<td width="20px"></td>
			<td><b><ins>An. <?php echo $data_nama;?></ins></b></td>
		</tr>
		<tr>
			<td></td>
		</tr><br>
		
	</tbody></table>
	<br style="line-height: 0.1em;">
	
	<table padding-top="10px" height="5px" border="0">
		<tbody><tr> 
			<td width="50px"></td>
			<td align="justify">&ensp;&ensp;&ensp;&ensp;Dengan ini diberitahukan bahwa dengan telah terpenuhinya masa kerja dan syarat-syarat lainnya kepada: </td>
			</tr>
		</tbody></table>

		<div>
		<table padding-top="10px" height="5px" border="0">
		<tbody><tr> 
			<td width="80px"></td>
			<td valign="top" width="150px">1. Nama</td>
			<td valign="top" width="10px">:</td>
			<td valign="top"><?php echo $data_cek['nama']; ?></td>
		</tr>
 
			<td width="80px"></td>
			<td valign="top" width="120px">2. Tempat Lahir</td>
			<td valign="top" width="10px">:</td>
			<td valign="top"><?php echo $data_cek['tempat_lahir']; ?></td>
		</tr>

			<td width="80px"></td>
			<td valign="top" width="120px">3. Tanggal Lahir</td>
			<td valign="top" width="10px">:</td>
			<td valign="top"><?php echo tgl_indo($data_cek['tanggal_lahir']); ?></td>
		</tr>
		<tr> 
			<td width="80px"></td>
			<td valign="top" width="120px">4. NIP</td>
			<td>:</td>
			<td><?php echo $data_cek['nip']; ?></td>
		</tr>
		<tr>
			<td width="80px"></td>
			<td valign="top" width="120px">5. Pangkat/Golongan</td>
			<td valign="top" width="10px">:</td>
			<td ><?php echo $data_cek['pangkat']; ?></td>
		</tr>
		<tr>
			<td width="80px"></td>
			<td valign="top" width="120px">6. Jabatan</td>
			<td valign="top" width="10px">:</td>
			<td><?php echo $data_cek['jabatan']; ?></td>
		</tr>
		<tr>
			<td width="80px"></td>
			<td valign="top" width="120px">7. Kantor/Tempat</td>
			<td width="10px">:</td>
			<td><?php echo $data_cek['unit']; ?></td>
		</tr>
		<tr>
			<td width="80px"></td>
			<td valign="top" width="120px">8. Gaji Pokok Lama</td>
			<td valign="top">:</td>
			<td align="justify"> <b><?php echo rupiah($data_cek['gajilama']); ?></b></td>
		</tr>
		</tbody></table>
			
	<table padding-top="10px" height="5px" border="0">
		<tbody><tr height="30px"> 
			<td width="50px"></td>
			<td><ins><b>Atas dasar SKP terakhir tentang gaji/pangkat yang ditetapkan:</b></ins></td>
			</tr>
		</tbody></table>
		<table>
			<tbody><tr height="5px">
			<td width="80px"></td>
			<td width="300px">a. Oleh Pejabat</td>
			<td width="10px">:</td>
			<td><?php echo $data_cek['pejabat']; ?></td>
		</tr>
		<tr height="5px">
			<td></td>
			<td width="300px">b. Nomor/Tanggal</td>
			<td>:</td>
			<td><?php echo $data_cek['no_sk']; ?></td>
		</tr>
		
		<tr height="5px">
			<td></td>
			<td width="300px">c. Tanggal mulai berlaku gaji tersebut </td>
			<td valign="top">:</td>
			<td valign="top"><?php echo tgl_indo($data_cek['tgl_mulai']); ?></td></tr>
		<tr height="6px">
			<td></td>
			<td width="300px">d. Masa Kerja Golongan pada tanggal tersebut</td>
			<td valign="top">:</td>
			<td valign="top"><?php echo $data_cek['masakerja']; ?></td>
		</tr>
	</tbody></table>
	

	<table padding-top="10px" height="5px" border="0">
		<tbody><tr height="30px"> 
			<td width="50px"></td>
			<td><ins><b>Diberikan kenaikan Gaji Berkala sehingga memperoleh:</b></ins> </td>
			</tr>
		</tbody></table>
		<table>
			<tbody><tr height="6px">
			<td width="80px"></td>
			<td valign="top" width="200px">9. Gaji Pokok Baru</td>
			<td valign="top" width="10px">:</td>
			<td align="justify"><b><?php echo rupiah($data_cek['gajibaru']); ?></b></td>
		</tr>
		<tr height="6px">
			<td width="55px"></td>
			<td>10. Berdasarkan masa kerja</td>
			<td>:</td>
			<td><?php echo $data_cek['masakerja_baru']; ?></td>
		</tr>
		<tr>
			<td width="55px"></td>
			<td>11. Dalam Golongan</td>
			<td>:</td>
			<td><?php echo $data_cek['golongan']; ?>
		<tr>
			<td width="55px"></td>
			<td>12. Terhitung Mulai Tanggal</td>
			<td>:</td>
			<td><?php echo tgl_indo($data_cek['tgl']); ?></td>
		</tr>
		
		
		
	</tbody></table>
	

<br>
		
	

	<table padding-top="10px" height="5px" border="0">
		<tbody><tr> 
			<td width="50px"></td>
			<td align="justify">&ensp;&ensp;&ensp;&ensp;Diharapkan agar dibayarkan sesuai dengan Peraturan Pemerintah Republik Indonesia Nomor 15 Tahun 2019 berdasarkan gaji pokok baru. </td>
			</tr>
		</tbody></table>
	

<br>


<div style="text-align: left; display: inline-block; float: right;">
        <h5>
			GUBERNUR KALIMANTAN SELATAN
            <br>KEPALA DINAS PENDIDIKAN BANJARMASIN
            <br>PROVINSI KALIMANTAN SELATAN
            <br><br>
                <img src="../../dist/img/ttd.png" align="left" width="85">
            <br><br><br><br><br><br>
			<U><ins>Nuryadi, S.Pd.,MA</ins><br></U>
            <U>NIP. 19670413198804 1 004<br></U>
        </h5>

    </div>
<br><br><br> <br><br><br><br>
<br><ins> Tembusan Kepada Yth.:  </ins><br>
 
  <li type="none">1. Kepala Kantor BKN Regional XI;</li>
    <li type="none">2. Pinpinan PT. Taspen;</li>
    <li type="none">3. Yang bersangkutan.</li>



<style>
        table.satu {
            border-collapse: collapse;
        }
        table {
            margin-top: -1px;
			margin-bottom: -2px;
        }
        table.satu, th.dua, td.tiga {
            border: 1px solid black;
        }
        td.tiga {
            padding: 10px;
        }
        td, th {
            padding: 0.8px;
        }
       
        
    </style>

<script>
		window.print();
	</script>

    

</div></div></form></body></html>