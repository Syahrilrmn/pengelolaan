<?php
$gaji 			= mysqli_query($koneksi, "SELECT * FROM tb_data_gaji");
$nama 			= mysqli_query($koneksi, "SELECT * FROM tb_data_gaji");
$tgl_lahir 		= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$tempat_lahir 	= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$pang_gol 		= mysqli_query($koneksi, "SELECT * FROM tb_data_gaji");
$jabatan 		= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$unit 		= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-kgb">Data Surat KBG</a></li>
    <li class="breadcrumb-item active">Tambah Data</li>
</ol>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="No Surat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Perihal</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" required>
				</div>
			</div>	
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Surat</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-7">
					<select name="nama" id="nama" class="form-control">
						<?php while ($row = mysqli_fetch_array($nama)) { ?>
							<option value="<?= $row['nama'] ?>"><?= $row['nama'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-7">
					<select name="tempat_lahir" id="tempat_lahir" class="form-control">
						<?php while ($row = mysqli_fetch_array($tempat_lahir)) { ?>
							<option value="<?= $row['tempat_lahir'] ?>"><?= $row['tempat_lahir'] ?></option>
						<?php } ?>
					</select>				
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-7">
					<select name="tanggal_lahir" id="tanggal_lahir" class="form-control">
						<?php while ($row = mysqli_fetch_array($tgl_lahir)) { ?>
							<option value="<?= $row['tanggal_lahir'] ?>"><?= $row['tanggal_lahir'] ?></option>
						<?php } ?>
					</select>				
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP / KARPEG</label>
				<div class="col-sm-7">
					<select name="nip" id="nip" class="form-control">
						<?php while ($row = mysqli_fetch_array($gaji)) { ?>
							<option value="<?= $row['nip'] ?>"><?= $row['nip'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat & Golong Ruang</label>
				<div class="col-sm-7">
					<select name="pangkat" id="pangkat" class="form-control">
						<?php while ($row = mysqli_fetch_array($pang_gol)) { ?>
							<option value="<?= $row['pangkat'] ?>, <?= $row['golongan'] ?>"><?= $row['pangkat'] ?>, <?= $row['golongan'] ?></option>
						<?php } ?>
					</select>				
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-7">
					<select name="jabatan" id="jabatan" class="form-control">
						<?php while ($row = mysqli_fetch_array($jabatan)) { ?>
							<option value="<?= $row['jabatan'] ?>"><?= $row['jabatan'] ?></option>
						<?php } ?>
					</select>				
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-7">
					<select name="unit" id="unit" class="form-control">
						<?php while ($row = mysqli_fetch_array($unit)) { ?>
							<option value="<?= $row['unit'] ?>"><?= $row['unit'] ?></option>
						<?php } ?>
					</select>				
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor SK / Tanggal SK</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="no_sk" name="no_sk" placeholder="Nomor SK / Tanggal SK" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Lama</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="masakerja" name="masakerja" placeholder="Masa Kerja Lama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok Lama</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="gajilama" name="gajilama" placeholder="Gaji Pokok Lama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Mulai Berlakunya Gaji</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Baru</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="masakerja_baru" name="masakerja_baru" placeholder="Masa kerja Baru" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Ruang</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan Ruang" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok Baru</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="gajibaru" name="gajibaru" placeholder="Gaji Pokok Baru" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mulai Tanggal</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Mulai Tanggal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kenaikan Gaji Berkala Berikutnya</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tgl_kenaikan" name="tgl_kenaikan" placeholder="Kenaikan Gaji" required>
				</div>
			</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kgb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO tb_kgb (no_surat, perihal, tanggal_surat, nama , tempat_lahir, tanggal_lahir,
	nip, pangkat, jabatan, unit, pejabat, no_sk, masakerja, gajilama, tgl_mulai, gajibaru, golongan,
	masakerja_baru, tgl, tgl_kenaikan) VALUES (
      		'" . $_POST['no_surat'] . "',
      		'" . $_POST['perihal'] . "',
			'" . $_POST['tanggal_surat'] . "',
			'" . $_POST['nama'] . "',
			'" . $_POST['tempat_lahir'] . "',
			'" . $_POST['tanggal_lahir'] . "',
			'" . $_POST['nip'] . "',
			'" . $_POST['pangkat'] . "',
			'" . $_POST['jabatan'] . "',
			'" . $_POST['unit'] . "',
			'Nuryadi, S.Pd.,MA',
			'" . $_POST['no_sk'] . "',
			'" . $_POST['masakerja'] . "',
			'" . $_POST['gajilama'] . "',
			'" . $_POST['tgl_mulai'] . "',
			'" . $_POST['gajibaru'] . "',
			'" . $_POST['golongan'] . "',
			'" . $_POST['masakerja_baru'] . "',
			'" . $_POST['tgl'] . "',
			'" . $_POST['tgl_kenaikan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kgb';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kgb';
          }
      })</script>";
	}
}
