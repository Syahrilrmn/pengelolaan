<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-pegawai">Data Pegawai</a></li>
    <li class="breadcrumb-item active">Tambah Kadis</li>
</ol>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Kadis
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama " required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
					<select class="form-control" name="jk" id="jk" required>
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload Foto</label>
				<div class="col-sm-5">				
				<label>Pilih Gambar untuk diupload:</label><br>
				<input type="file" accept="application/img" class="form-control" name="upload" id="upload"><br>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

$sumber = @$_FILES['upload']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['upload']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset($_POST['Simpan'])) {
	$sql_simpan = "INSERT INTO tb_kadis (nip, nama, alamat, jk, tempat_lahir, tanggal_lahir, foto) VALUES (
			'" . $_POST['nip'] . "',
			'" . $_POST['nama'] . "',
			'" . $_POST['alamat'] . "',
			'" . $_POST['jk'] . "',
			'" . $_POST['tempat_lahir'] . "',
			'" . $_POST['tanggal_lahir'] . "',
			'".$nama_file."')";

	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	$sql_akun = "INSERT INTO tb_pengguna (nama_pengguna, username, password, level, foto) VALUES (
		'".$_POST['nama']."',
		'".$_POST['nip']."',
		'1234567890',
		'Kadis',
		'".$nama_file."')";
	$query_akun = mysqli_query($koneksi, $sql_akun);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-profil';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kadis';
          }
      })</script>";
	}
}
	// }elseif(empty($sumber)){
	// 	echo "<script>
	// 	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			window.location = 'index.php?page=add-pegawai';
	// 		}
	// 	})</script>";
	// }
	
     //selesai proses simpan data
