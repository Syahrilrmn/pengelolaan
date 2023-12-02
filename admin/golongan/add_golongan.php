<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data-golongan">Data Golongan</a></li>
    <li class="breadcrumb-item active">Tambah Data Golongan</li>
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
				<label class="col-sm-2 col-form-label">Nama Golongan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="golongan" name="golongan" placeholder="golongan" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-golongan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	$sql_simpan = "INSERT INTO tb_golongan (golongan) VALUES (
			'" . $_POST['golongan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-golongan';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-golongan';
          }
      })</script>";
	}
}
	// }elseif(empty($sumber)){
	// 	echo "<script>
	// 	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			window.location = 'index.php?page=add-golongan';
	// 		}
	// 	})</script>";
	// }
	
     //selesai proses simpan data
