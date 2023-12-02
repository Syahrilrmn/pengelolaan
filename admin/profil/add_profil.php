
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Profil</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pemerintahan</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nama_pemerintahan" name="nama_pemerintahan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Dinas</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nama_dinas" name="nama_dinas" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="alamat" name="alamat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="bidang" name="bidang" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" id="logo" name="logo">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
			<a href="?page=data-profil" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$sumber = @$_FILES['logo']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['logo']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['simpan'])){
    $sql_simpan = "INSERT INTO tb_profil (nama_pemerintahan, nama_dinas, alamat, bidang, logo) VALUES (
    '".$_POST['nama_pemerintahan']."',
	'".$_POST['nama_dinas']."', 
    '".$_POST['alamat']."', 
    '".$_POST['bidang']."',
	'".$nama_file."')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Simpan Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-profil';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Simpan Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-profil';
        }
      })</script>";
    }}
