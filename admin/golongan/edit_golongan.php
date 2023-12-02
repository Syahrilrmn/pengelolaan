<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_golongan WHERE id_golongan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data-golongan">Data Golongan</a></li>
    <li class="breadcrumb-item active">Edit Data Golongan</li>
</ol>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Golongan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="golongan" name="golongan" placeholder="golongan" value="<?php echo $data_cek['golongan'];?>">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="ubah" value="Simpan" class="btn btn-info">
			<a href="?page=data-golongan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['ubah'])) {
	$sql_ubah = "UPDATE tb_golongan SET
    golongan='".$_POST['golongan']."'
    WHERE id_golongan='".$_GET['kode']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-golongan';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=edit-golongan';
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
	
     //selesai proses ubah data
