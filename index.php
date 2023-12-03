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
	$data_puser = $_SESSION['ses_puser'];
}

//KONEKSI DB
include "inc/koneksi.php";
include "inc/tglindo.php";
include "inc/rupiah.php";
include "inc/terbilang.php";
include "inc/haritgl_indo.php";
include "inc/fungsi_romawi.php";

$sql = $koneksi->query("SELECT * from tb_profil");
while ($data = $sql->fetch_assoc()) {

	$nama = $data['nama_pemerintahan'];
	$logo = $data['logo'];
	$unit = $data['nama_dinas'];
}
?>
<!-- <?php
		date_default_timezone_set('Asia/Maksar');
		setlocale(LC_TIME, 'IND');
		$hariIni = new DateTime();

		?> -->
<?php

$sql = $koneksi->query("SELECT count(id_info) as info from tb_info");
while ($data = $sql->fetch_assoc()) {

	$info = $data['info'];
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PENGELOLAAN DATA KGB</title>
	<link rel="icon" href="dist/img/dinas.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Icon Bot -->
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
						<i class="bi bi-bell"></i>
						<span class="badge bg-primary badge-number"><?php echo $info;  ?></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
						<li class="dropdown-header">
							Anda mempunyai <?php echo $info;  ?> Pengumuman
							<a href="?page=hal-pengumuman"><span class="badge rounded-pill bg-primary p-2 ms-2">lihat semua</span></a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<?php
						$sql = $koneksi->query("select * from tb_info");
						while ($data = $sql->fetch_assoc()) {
						?>
							<li class="notification-item">
								<div>
									<h6><b><?php echo $data['info']; ?></b></h6>
								</div>
								<div><span> <?php echo tgl_indo($data['dari_tgl']); ?>,
										- <?php echo tgl_indo($data['sampai_tgl']); ?></span>
								</div>
								<div>
									<p> <?php echo $data['ket']; ?></p>
								</div>
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
						<?php
						} ?>
					</ul>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
				<li class="nav-item dropdown pe-3">

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<i class="fas fa-bars fa-home"></i>
					</a><!-- End Profile Iamge Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<a href="index.php"><i class="fas fa-home"></i></a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="?page=edit-akun">
								<i class="bi bi-gear"></i>
								<span>Edit Akun</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="logout.php">
								<i class="bi bi-box-arrow-right"></i>
								<span>Keluar</span>
							</a>
						</li>
				</li>
			</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
					<font color="white">
						<b>
							<?php echo haritgl_indo(date('Y-m-d')); ?> - <b><span id="jam" style="font-size:24"></span></b>
						</b>
					</font>
				</a>
			</li>
			</ul>



		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">

				<span class="brand-text"> PENGELOLAAN DATA KGB </span>
			</a>


			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="foto/<?php echo $data_puser; ?>" class="img-circle elevation-1" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Admin") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=data-presensi" class="nav-link">
									<i class="nav-icon far fa fa-fingerprint"></i>
									<p>
										Presensi
									</p>
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="?page=data-pegawai" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Pegawai
									</p>
								</a>
							</li> -->
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Data Pegawai
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-pegawai" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Rekap / Bezetting Pegawai</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=duk-pegawai" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Daftar Urut Kepangkatan</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=data-status" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Status Keadaan Pegawai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-status" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Status Keadaan Pegawai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=kenaikan-pegawai" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Kenaikan Pangkat Pegawai</p>
										</a>
									</li>



								</ul>
							</li>

							<li class="nav-item">
								<a href="?page=data-gaji" class="nav-link">
									<i class="nav-icon fas bi bi-cash-coin"></i>
									<p>
										Data Gaji
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-golongan" class="nav-link">
									<i class="nav-icon far bi bi-diagram-2-fill"></i>
									<p>
										Data Golongan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pangkat" class="nav-link">
									<i class="nav-icon far bi bi-diagram-2-fill"></i>
									<p>
										Data Pangkat
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengajuankgb-01" class="nav-link">
									<i class="nav-icon fas bi bi-person-lines-fill"></i>
									<p>
										Pengajuan KGB
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-kgb" class="nav-link">
									<i class="nav-icon fas bi bi-vector-pen"></i>
									<p>
										SK KGB
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-naik_gaji" class="nav-link">
									<i class="nav-icon fas bi bi-clipboard-data"></i>
									<p>Rekapitulasi KGB</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pegawai-pensiun" class="nav-link">
									<i class="nav-icon fas bi bi-person-lines-fill"></i>
									<p>
										Pegawai pensiun
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengajuan-pensiun-01" class="nav-link">
									<i class="nav-icon fas bi bi-person-lines-fill"></i>
									<p>
										Pengajuan pensiun
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-clipboard-list"></i>
									<p>
										Laporan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=laporan-gaji" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Gaji</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuankgb-01" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Pengajuan KGB</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuankgb-diterima" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Pengajuan KGB Diterima</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuankgb-ditolak" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Pengajuan KGB Ditolak</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-kgb" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>SK KGB</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuan-pensiun-01" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Pegawai Pensiun</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuan-pensiun-diterima" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Pengajuan Pensiun Diterima</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuan-pensiun-ditolak" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Pengajuan Pensiun Ditolak</p>
										</a>
									</li>

								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-clipboard-list"></i>
									<p>
										Data Riwayat
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-rpp" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Riwayat Pendidikan Pegawai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=laporan-pengajuankgb-01" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Riwayat Keluarga Pegawai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-rp" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Riwayat Kepegawaian</p>
										</a>
									</li>


								</ul>
							</li>
							<li class="nav-header">Setting</li>
							<li class="nav-item">
								<a href="?page=data-profil" class="nav-link">
									<i class="nav-icon far fa fa-flag"></i>
									<p>
										Profil Dinas
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=data-info" class="nav-link">
									<i class="nav-icon far bi bi-volume-up-fill"></i>
									<p>
										Pengumuman
									</p>
								</a>
							</li>
						<?php
						} elseif ($data_level == "Kadis") {
						?>
							` <li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-kgb" class="nav-link">
									<i class="nav-icon fas bi bi-vector-pen"></i>
									<p>
										SK KGB
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengajuankgb-02" class="nav-link">
									<i class="nav-icon fas bi bi-person-lines-fill"></i>
									<p>
										Pengajuan KGB
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=data-pengajuan-pensiun-02" class="nav-link">
									<i class="nav-icon fas bi bi-person-lines-fill"></i>
									<p>
										Pengajuan pensiun
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Pegawai") {
						?>

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=tampil-data" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Data Pegawai
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-gajip" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Data Gaji
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengajuan-kgb" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Pengajuan KGB
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=hal-pengumuman" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Pengumuman
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=kenaikan" class="nav-link">
									<i class="nav-icon fas fa-envelope"></i>
									<p>Kenaikan Pangkat</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-skbg" class="nav-link">
									<i class="nav-icon fas fa-arrow-circle-right"></i>
									<p>
										SK KGB
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengajuan-pensiun" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Pengajuan pensiun
									</p>
								</a>
							</li>

							<li class="nav-header">Setting</li>

						<?php
						}
						?>
						<li class="nav-item">
							<a href="?page=edit-akun" class="nav-link">
								<i class="nav-icon far fa-edit"></i>
								<p>
									Edit Profil
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fa bi bi-power"></i>
								<p>
									Logout
								</p>
							</a>
						</li>


				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Pegawai pensiun
							case 'data-pegawai-pensiun':
								include "admin/pensiun/data_pegawai_pensiun.php";
								break;
							case 'add-pegawai-pensiun':
								include "admin/pensiun/add_pegawai_pensiun.php";
								break;
							case 'edit-pegawai-pensiun':
								include "admin/pensiun/edit_pegawai_pensiun.php";
								break;
							case 'del-pegawai-pensiun':
								include "admin/pensiun/del_pegawai_pensiun.php";
								break;
							case 'detail-pegawai-pensiun':
								include "admin/pensiun/detail_pegawai_pensiun.php";
								break;

								//ACC pengajuan pensiun
							case 'data-pengajuan-pensiun-02':
								include "kadis/pengajuan_pensiun/data_ppensiun.php";
								break;
							case 'edit-pengajuan-pensiun-02':
								include "kadis/pengajuan_pensiun/edit_ppensiun.php";
								break;
							case 'detail-pengajuan-pensiun-02':
								include "kadis/pengajuan_pensiun/detail_pensiun.php";
								break;

							case 'data-pengajuan-pensiun-01':
								include "admin/pengajuan_pensiun/data_ppensiun.php";
								break;
							case 'detail-pengajuan-pensiun-01':
								include "admin/pengajuan_pensiun/detail_ppensiun.php";
								break;
							case 'edit-pengajuan-pensiun-01':
								include "admin/pengajuan_pensiun/edit_ppensiun.php";
								break;
							case 'laporan-pengajuan-pensiun-01':
								include "admin/pengajuan_pensiun/laporan_ppensiun.php";
								break;
							case 'laporan-pengajuan-pensiun-diterima':
								include "admin/pengajuan_pensiun/laporan_diterima.php";
								break;
							case 'laporan-pengajuan-pensiun-ditolak':
								include "admin/pengajuan_pensiun/laporan_ditolak.php";
								break;

								//ACC Pengajuan KGB
							case 'data-pengajuankgb-01':
								include "admin/pengajuan_kgb/data_pengajuankgb.php";
								break;
							case 'add-pengajuankgb-01':
								include "admin/pengajuan_kgb/add_pengajuankgb.php";
								break;
							case 'edit-pengajuankgb-01':
								include "admin/pengajuan_kgb/edit_pengajuankgb.php";
								break;
							case 'laporan-pengajuankgb-01':
								include "admin/pengajuan_kgb/laporan_pengajuankgb.php";
								break;
							case 'laporan-pengajuankgb-diterima':
								include "admin/pengajuan_kgb/laporan_diterima.php";
								break;
							case 'laporan-pengajuankgb-ditolak':
								include "admin/pengajuan_kgb/laporan_ditolak.php";
								break;
							case 'detail-pengajuankgb-01':
								include "admin/pengajuan_kgb/detail_pengajuankgb.php";
								break;

							case 'data-pengajuankgb-02':
								include "kadis/pengajuan_kgb/data_pengajuankgb.php";
								break;
							case 'add-pengajuankgb-02':
								include "kadis/pengajuan_kgb/add_pengajuankgb.php";
								break;
							case 'edit-pengajuankgb-02':
								include "kadis/pengajuan_kgb/edit_pengajuankgb.php";
								break;
							case 'detail-pengajuankgb-02':
								include "kadis/pengajuan_kgb/detail_pengajuankgb.php";
								break;

								//Pengajuan KGB
							case 'data-pengajuan-kgb':
								include "pegawai/pengajuan_kgb/data_pengajuankgb.php";
								break;
							case 'add-pengajuan-kgb':
								include "pegawai/pengajuan_kgb/add_pengajuankgb.php";
								break;
							case 'del-pengajuan-kgb':
								include "pegawai/pengajuan_kgb/del_pengajuankgb.php";
								break;

								//Permohonan pensiun
							case 'data-pengajuan-pensiun':
								include "pegawai/pengajuan_pensiun/data_ppensiun.php";
								break;
							case 'add-pengajuan-pensiun':
								include "pegawai/pengajuan_pensiun/add_ppensiun.php";
								break;
							case 'del-pengajuan-pensiun':
								include "pegawai/pengajuan_pensiun/del_ppensiun.php";
								break;
							case 'detail-pengajuan-pensiun':
								include "pegawai/pengajuan_pensiun/detail_ppensiun.php";
								break;

								//Klik Halaman Home Pengguna
							case 'Admin':
								include "home/admin.php";
								break;
							case 'Pegawai':
								include "home/pegawai.php";
								break;
							case 'edit-akun':
								include "admin/edit_akun.php";
								break;
							case 'hal-pengumuman':
								include "home/pengumuman.php";
								break;

								//Daftar Gaji
							case 'data-daftargaji':
								include "admin/daftar_gaji/data_daftargaji.php";
								break;
							case 'add-daftargaji':
								include "admin/daftar_gaji/add_daftargaji.php";
								break;
							case 'edit-daftargaji':
								include "admin/daftar_gaji/edit_daftargaji.php";
								break;
							case 'del-daftargaji':
								include "admin/daftar_gaji/del_daftargaji.php";
								break;
							case 'update-daftargaji':
								include "admin/daftar_gaji/update_daftargaji.php";
								break;
							case 'laporan-daftargaji':
								include "admin/daftar_gaji/laporan_daftargaji.php";
								break;

								//Presensi
							case 'data-presensi':
								include "admin/presensi/data_presensi.php";
								break;
							case 'add-presensi':
								include "admin/presensi/add_presensi.php";
								break;
							case 'edit-presensi':
								include "admin/presensi/edit_presensi.php";
								break;
							case 'del-presensi':
								include "admin/presensi/del_presensi.php";
								break;
							case 'tampil-presensi':
								include "admin/presensi/tampil_presensi.php";
								break;

								//Pangkat
							case 'data-pangkat':
								include "admin/pangkat/data_pangkat.php";
								break;
							case 'add-pangkat':
								include "admin/pangkat/add_pangkat.php";
								break;
							case 'edit-pangkat':
								include "admin/pangkat/edit_pangkat.php";
								break;
							case 'del-pangkat':
								include "admin/pangkat/del_pangkat.php";
								break;

								//Golongan
							case 'data-golongan':
								include "admin/golongan/data_golongan.php";
								break;
							case 'add-golongan':
								include "admin/golongan/add_golongan.php";
								break;
							case 'edit-golongan':
								include "admin/golongan/edit_golongan.php";
								break;
							case 'del-golongan':
								include "admin/golongan/del_golongan.php";
								break;
								//kepegawaian
							case 'data-rp':
								include "admin/rp/r_view.php";
								break;
							case 'add-rp':
								include "admin/rp/r_tambah.php";
								break;
							case 'edit-rp':
								include "admin/rp/r_edit.php";
								break;
							case 'del-rp':
								include "admin/rp/r_hapus.php";
								break;

								//skbg
							case 'data-skbg':
								include "pegawai/surat_kbg/data_skbg.php";
								break;
							case 'add-skbg':
								include "pegawai/surat_kbg/add_skbg.php";
								break;

								//gajipegawai
							case 'tampil-gajip':
								include "pegawai/gaji/tampil_gaji.php";
								break;
							case 'edit-gajip':
								include "pegawai/gaji/edit_gaji.php";
								break;
							case 'data-gajip':
								include "pegawai/gaji/data_gaji.php";
								break;

								//naikgajip
							case 'data-naikgaji':
								include "pegawai/naik_gaji/data_naikgaji.php";
								break;
							case 'tampil-naikgaji':
								include "pegawai/naik_gaji/view_ng.php";
								break;

								//rkppegawai
							case 'data-rkp':
								include "pegawai/riwayat_kp/data_rkp.php";
								break;
							case 'add-rkp':
								include "pegawai/riwayat_kp/add_rkp.php";
								break;
							case 'edit-rkp':
								include "pegawai/riwayat_kp/edit_rkp.php";
								break;
							case 'del-rkp':
								include "pegawai/riwayat_kp/del_rkp.php";
								break;
							case 'view-rkp':
								include "pegawai/riwayat_kp/view_rkp.php";
								break;

								//Pengumuman
							case 'data-info':
								include "admin/info/data_info.php";
								break;
							case 'add-info':
								include "admin/info/add_info.php";
								break;
							case 'del-info':
								include "admin/info/del_info.php";
								break;
							case 'edit-info':
								include "admin/info/edit_info.php";
								break;
							case 'tampil-info':
								include "admin/info/tampil_info.php";
								break;

								//pegawaiadmin
							case 'data-pegawai':
								include "admin/pegawai/data_pegawai.php";
								break;
							case 'duk-pegawai':
								include "admin/pegawai/duk.php";
								break;
							case 'add-pegawai':
								include "admin/pegawai/add_pegawai.php";
								break;
							case 'edit-pegawai':
								include "admin/pegawai/edit_pegawai.php";
								break;
							case 'del-pegawai':
								include "admin/pegawai/del_pegawai.php";
								break;
							case 'view-pegawai':
								include "admin/pegawai/view_pegawai.php";
								break;
							case 'laporan-pegawai':
								include "admin/pegawai/laporan_pegawai.php";
								break;
							case 'laporan-cetak':
								include "admin/pegawai/cetak.php";
								break;
							case 'pegawai-laporan':
								include "admin/pegawai/pegawai_laporan.php";
								break;
							case 'data-pegawai_user2':
								include "admin/pegawai/data_pegawai_user2.php";
								break;
							case 'data-status':
								include "admin/pegawai/status.php";
								break;
							case 'edit-status-01':
								include "admin/pegawai/edit_status.php";
								break;
							case 'kenaikan-pegawai':
								include "admin/pegawai/kenaikan.php";
								break;
							case 'edit-pangkat-01':
								include "admin/pegawai/edit_pangkat.php";
								break;

								//User Pegawai
							case 'tampil-data':
								include "pegawai/data_pegawai/tampil_pegawai.php";
								break;
							case 'edit-datap':
								include "pegawai/data_pegawai/edit_pegawai.php";
								break;

								//pegawai crew
							case 'crew-data-pegawai':
								include "crew/pegawai/data_pegawai.php";
								break;
							case 'crew-data-gaji':
								include "crew/gaji/data_gaji.php";
								break;
							case 'crew-data-naik_gaji':
								include "crew/naik_gaji/naik_gaji.php";
								break;
							case 'crew-data-kgb':
								include "crew/kgb/kgb.php";
								break;
							case 'crew-data-riwayatkp':
								include "crew/riwayatkp/riwayatkp.php";
								break;

								//gaji pegawai
							case 'data-gaji':
								include "admin/gaji/data_gaji.php";
								break;
							case 'data-gaji_user2':
								include "admin/gaji/data_gaji_user2.php";
								break;
							case 'add-gaji':
								include "admin/gaji/add_gaji.php";
								break;
							case 'view-gaji':
								include "admin/gaji/view_gaji.php";
								break;
							case 'edit-gaji':
								include "admin/gaji/edit_gaji.php";
								break;
							case 'del-gaji':
								include "admin/gaji/del_gaji.php";
								break;
							case 'laporan-gaji':
								include "admin/gaji/laporan_gaji.php";
								break;

								//naik_gaji
							case 'data-naik_gaji':
								include "admin/naik_gaji/data_naik_gaji.php";
								break;
							case 'data-naik_gaji_user2':
								include "admin/naik_gaji/data_naik_gaji_user2.php";
								break;
							case 'add-naik_gaji':
								include "admin/naik_gaji/add_naik_gaji.php";
								break;
							case 'view-naik_gaji':
								include "admin/naik_gaji/view_naik_gaji.php";
								break;
							case 'edit-naik_gaji':
								include "admin/naik_gaji/edit_naik_gaji.php";
								break;
							case 'del-naik_gaji':
								include "admin/naik_gaji/del_naik_gaji.php";
								break;
							case 'laporan-naik_gaji':
								include "admin/naik_gaji/laporan_naik_gaji.php";
								break;
								//pangkat
							case 'kenaikan':
								include "pegawai/pangkat/data_pangkat.php";
								break;

								//kgb
							case 'data-kgb':
								include "admin/kgb/data_kgb.php";
								break;
							case 'data-kgb_user2':
								include "admin/kgb/data_kgb_user2.php";
								break;
							case 'add-kgb':
								include "admin/kgb/add_kgb.php";
								break;
							case 'edit-kgb':
								include "admin/kgb/edit_kgb.php";
								break;
							case 'del-kgb':
								include "admin/kgb/del_kgb.php";
								break;
							case 'view-kgb':
								include "admin/kgb/view_kgb.php";
								break;
							case 'cetak-kgb':
								include "admin/kgb/cetak_kgb.php";
								break;
							case 'laporan-kgb':
								include "admin/kgb/laporan_kgb.php";
								break;
							case 'tambah_skkgb':
								include "admin/kgb/sk_kgb.php";
								break;

								//riwayatkp
							case 'data-riwayatkp':
								include "admin/riwayatkp/data_riwayatkp.php";
								break;
							case 'data-riwayatkp_user2':
								include "admin/riwayatkp/data_riwayatkp_user2.php";
								break;
							case 'add-riwayatkp':
								include "admin/riwayatkp/add_riwayatkp.php";
								break;
							case 'edit-riwayatkp':
								include "admin/riwayatkp/edit_riwayatkp.php";
								break;
							case 'del-riwayatkp':
								include "admin/riwayatkp/del_riwayatkp.php";
								break;
							case 'laporan-riwayatkp':
								include "admin/riwayatkp/laporan_riwayatkp.php";
								break;
							case 'view-riwayatkp':
								include "admin/riwayatkp/view_riwayatkp.php";
								break;
							case 'print-riwayatkp':
								include "admin/riwayatkp/print_riwayatkp.php";
								break;

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//Profil
							case 'data-profil':
								include "admin/profil/data_profil.php";
								break;
							case 'edit-profil':
								include "admin/profil/edit_profil.php";
								break;
							case 'add-profil':
								include "admin/profil/add_profil.php";
								break;
							case 'add-kadis':
								include "admin/profil/add_kadis.php";
								break;
							case 'del-kadis':
								include "admin/profil/del_kadis.php";
								break;
							case 'edit-kadis':
								include "admin/profil/edit_kadis.php";
								break;

								// laporan
							case 'data-laporan':
								include "admin/laporan/kgb.php";
								break;
							case 'cetak':
								include "admin/laporan/cetak.php";
								break;
								// laporan
							case 'data-report':
								include "report/cetak-data-pegawai.php";
								break;
							case 'cetak':
								include "admin/laporan/cetak.php";
								break;



								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Admin") {
							include "home/admin.php";
						} elseif ($data_level == "Kadis") {
							include "home/admin.php";
						} elseif ($data_level == "Pegawai") {
							include "home/pegawai.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<span>Jl. Kapten Piere Tendean No.29, RT.40, Gadang, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70231</span>

				<!-- All rights reserved. -->
			</div>
			<b>DINAS PENDIDIKAN KOTA BANJARMASIN</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
		//scrip jam realtime
	</script>
	<script type="text/javascript">
		window.onload = function() {
			jam();
		}

		function jam() {
			var e = document.getElementById('jam'),
				d = new Date(),
				h, m, s;
			h = d.getHours();
			m = set(d.getMinutes());
			s = set(d.getSeconds());

			e.innerHTML = h + ':' + m + ':' + s;

			setTimeout('jam()', 1000);
		}

		function set(e) {
			e = e < 10 ? '0' + e : e;
			return e;
		}
	</script>
	<script>
		$(document).ready(function() {
			$('#example1').DataTable();
		});
	</script>


</body>

</html>