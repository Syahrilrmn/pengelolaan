<?php

    $sql_cek = "SELECT * FROM tb_profil";
    $query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="card card-info">
	<div class="card-header">
		<h4>
		<marquee behavior="scroll" direction="left" scrollamount="2" align="center">
			Selamat datang di website kami, <b><?php echo $data_nama ?></b> Anda login sebagai <?php echo $data_level;?>
		</marquee>
		</h4>
	</div>
</div>
<div class="row">
	<div class="card card-info col-8">
		<div class="card-body">
			<center>
				<br><br>
				<img src="foto/<?php echo $data_cek['logo']; ?>" alt="" width="200px">
				<br></br>
				<h2><?php echo $data_cek['nama_dinas']; ?> <?php echo $data_cek['nama_pemerintahan']; ?></h2>
				<span><?php echo $data_cek['alamat']; ?></span>
				<br><br>
			</center>
		</div>
	</div>
	<div class="card card-info col-4">
		<div class="card-body">
			<h5 class="fa bi bi-megaphone-fill"> PENGUMUMAN</h5>
			<br><br>
			<?php
				$sql = $koneksi->query("select * from tb_info");
				while ($data = $sql->fetch_assoc()) {
			?>
				<div>
				<h6><b><?php echo $data['info'] ;?></b></h6>
				</div>
				<div><span>Dari tanggal <?php echo tgl_indo($data['dari_tgl']) ;?>, 
				sampai <?php echo tgl_indo($data['sampai_tgl']) ;?></span>
				</div>
				<div><p><?php echo $data['ket'];?></p></div>
			<?php
			}?>
		</div>
	</div>
</div>
<?php

	$sql = $koneksi->query("SELECT count(nip) as lokal from tb_pegawai");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal=$data['lokal'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_pengguna) as mahesa from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
	
		$mahesa=$data['mahesa'];
	}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $lokal;  ?>
				</h3>

				<p>Jumlah Pegawai</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-pegawai" class="small-box-footer">Selengkapnya
				
			</a>
		</div>
	</div>
	<!-- ./col -->
	
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $lokal;  ?>
				</h3>

				<p>Jumlah Pegawai Naik Gaji</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-naik_gaji" class="small-box-footer">Selengkapnya
				
			</a>
		</div>
</div>
		<!-- ./col -->
	
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $mahesa;  ?>
				</h3>

				<p>Pengguna Sistem</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="index.php?page=data-pengguna" class="small-box-footer">Informasi
			</a>
		</div>
	</div>