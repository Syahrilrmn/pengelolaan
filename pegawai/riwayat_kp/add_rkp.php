<?php
$sql_cek = "SELECT * FROM tb_pegawai WHERE nip='$data_user'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip'];?>"readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama'];?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $data_cek['tmt'];?>" readonly>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan Sebelum</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan_sebelum" name="jabatan_sebelum" placeholder="Jabatan Sebelum" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan Setelah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan_setelah" name="jabatan_setelah" placeholder="Jabatan Setelah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="unit" name="unit" placeholder="Unit Organisasi" value="<?php echo $data_cek['unit'];?>" readonly>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-rkp" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){

        $sql_simpan = "INSERT INTO tb_riwayatkp (nip, nama, tgl, jabatan_sebelum, jabatan_setelah, unit) VALUES (
      '".$_POST['nip']."',
			'".$_POST['nama']."',
			'".$_POST['tgl']."',
			'".$_POST['jabatan_sebelum']."',
			'".$_POST['jabatan_setelah']."',
			'".$_POST['unit']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-rkp';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-riwayatkp';
          }
      })</script>";
	  }
	}
