<?php
include "../inc/koneksi.php";

$id_pegawai = $_GET['id_pegawai'];

$sql_cek = "SELECT * FROM tb_profil";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH); {
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>CETAK DATA PEGAWAI</title>


	</head>

	<body>

		<!-- <img src="mahesa2.png" align=left height="80" width="90" style=" position:absolute; "> -->
		<!-- <img src="dist/img/mahesa.jpg" align=left height="10" width="120"> -->
		<img src="dinas.png" align=right height="80" width="90" style="margin-right: 20px;">

		<h2 style="padding-left: 38%;">
			<?php echo $data_cek['nama_profil']; ?>
		</h2>
		<h3 style="padding-left: 40%;">
			<?php echo $data_cek['alamat']; ?>

		</h3>
		<hr size="2px" color="black">

	<?php
}


$sql_tampil = "select * from tb_pegawai where id_pegawai='$id_pegawai'";
$query_tampil = mysqli_query($koneksi, $sql_tampil);
$no = 1;
while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
	?>
		</center>

		<center>
			<h4>
				<u>DATA PEGAWAI</u>
			</h4>
		</center>

		<table border="1" cellspacing="0" style="width: 90%" align="center">
			<tbody>
				<tr>
					<td>ID</td>
					<td>:</td>
					<td>
						<?php echo $data['id_pegawai']; ?>
					</td>
					<td rowspan="10" align="center">
						<img src="../foto/<?php echo $data['foto']; ?>" width="150px" />
					</td>
				</tr>
				<tr>
					<td>NIP</td>
					<td>:</td>
					<td>
						<?php echo $data['nip']; ?>
					</td>
				</tr>
				<tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<?php echo $data['nama']; ?>
					</td>
				</tr>
				<tr>
					<td>Karpeg</td>
					<td>:</td>
					<td>
						<?php echo $data['alamat']; ?>
					</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>
						<?php echo $data['kota']; ?>
					</td>
				</tr>
				<tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td>
						<?php echo $data['tanggal_lahir']; ?>
					</td>
				</tr>
				<tr>
					<td>Pangkat</td>
					<td>:</td>
					<td>
						<?php echo $data['pangkat']; ?>
					</td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td>:</td>
					<td>
						<?php echo $data['jabatan']; ?>
					</td>
				</tr>
				<tr>
					<td>Unit Organisasi</td>
					<td>:</td>
					<td>
						<?php echo $data['unit']; ?>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>


		<script>
			window.print();
		</script>

	</body>

	</html>