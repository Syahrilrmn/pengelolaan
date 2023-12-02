<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_daftargaji WHERE id_daftargaji='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
$golongan 	= mysqli_query($koneksi, "SELECT * FROM tb_golongan");
$pangkat 	= mysqli_query($koneksi, "SELECT * FROM tb_pangkat");
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data-daftargaji">Data Daftar Gaji</a></li>
    <li class="breadcrumb-item active">Edit Data Daftar Gaji</li>
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
				<label class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_daftargaji" name="id_daftargaji" value="<?php echo $data_cek['id_daftargaji'];?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">MKG</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="mkg" name="mkg" value="<?php echo $data_cek['mkg'];?>" readonly>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo $data_cek['pangkat'];?>" readonly>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="golongan" name="golongan" value="<?php echo $data_cek['golongan'];?>" readonly>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Lama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="gaji_before" name="gaji_before" value="<?php echo $data_cek['gaji_now'];?>" readonly>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Baru</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gaji_now" name="gaji_now" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="ubah" value="Simpan" class="btn btn-info">
			<a href="?page=data-daftargaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['ubah'])) {
	$sql_ubah = "UPDATE tb_daftargaji SET
	id_daftargaji='".$_POST['id_daftargaji']."',
    mkg='".$_POST['mkg']."',
    pangkat='".$_POST['pangkat']."',
    golongan='".$_POST['golongan']."',
    gaji_before='".$_POST['gaji_before']."',
    gaji_now='".$_POST['gaji_now']."'
    WHERE id_daftargaji='".$_GET['kode']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-daftargaji';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=update-daftargaji';
          }
      })</script>";
	}
}
	// }elseif(empty($sumber)){
	// 	echo "<script>
	// 	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			window.location = 'index.php?page=add-daftargaji';
	// 		}
	// 	})</script>";
	// }
	
     //selesai proses simpan data
