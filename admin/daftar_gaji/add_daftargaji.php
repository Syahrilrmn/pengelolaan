<?php
$golongan 	= mysqli_query($koneksi, "SELECT * FROM tb_golongan");
$pangkat 	= mysqli_query($koneksi, "SELECT * FROM tb_pangkat");
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data-daftargaji">Data Daftar Gaji</a></li>
    <li class="breadcrumb-item active">Tambah Data Daftar Gaji</li>
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
				<label class="col-sm-2 col-form-label">MKG</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="mkg" name="mkg" placeholder="MKG" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat</label>
				<div class="col-sm-5">
                    <select name="pangkat" id="pangkat" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($pangkat)) { ?>
							<option value="<?= $row['pangkat'] ?>"><?= $row['pangkat'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan</label>
				<div class="col-sm-5">
                    <select name="golongan" id="golongan" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($golongan)) { ?>
							<option value="<?= $row['golongan'] ?>"><?= $row['golongan'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukkan Gaji" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-daftargaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	$sql_simpan = "INSERT INTO tb_daftargaji (id_daftargaji, golongan, pangkat, mkg, gaji_now) VALUES (
		'K" . $_POST['mkg'] . "" . $_POST['golongan'] . "',
		'" . $_POST['golongan'] . "',
        '" . $_POST['pangkat'] . "',
        '" . $_POST['mkg'] . "',
        '" . $_POST['gaji'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-daftargaji';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-daftargaji';
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
