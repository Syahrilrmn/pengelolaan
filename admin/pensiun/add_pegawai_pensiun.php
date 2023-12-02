<?php

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_ppensiun WHERE nip='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NIP</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jk" name="jk" value="<?php echo $data_cek['jk'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tempat Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data_cek['tanggal_lahir'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Usia</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="usia" name="usia" value="<?php echo $data_cek['usia'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">TMT</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tmt_kerja" name="tmt_kerja" value="<?php echo $data_cek['tmt_kinerja'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Gaji Pokok</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="gapok" name="gapok" value="<?php echo $data_cek['gapok'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">No. Rekening</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="no_rek" name="no_rek" value="<?php echo $data_cek['no_rek'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Pengsiun</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl_pensiun" name="tgl_pensiun" placeholder="Masukan Tanggal Pengsiun" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengajuan-pensiun-01" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	$sql_simpan = "INSERT INTO tb_pensiun (
		NIP, nama, tempat_lahir, tanggal_lahir, jk, usia, tgl_pensiun, tmt_kerja, gapok, no_rek) VALUES (
			'" . $_POST['nip'] . "',
		 	'" . $_POST['nama'] . "',
			'" . $_POST['tempat_lahir'] . "',
	     	'" . $_POST['tanggal_lahir'] . "',
			'" . $_POST['jk'] . "',
			'" . $_POST['usia'] . "',
			'" . $_POST['tgl_pensiun'] . "',
			'" . $_POST['tmt_kerja'] . "',
			'" . $_POST['gapok'] . "',
			'" . $_POST['no_rek'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengajuan-pensiun-01';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pegawai-pensiun';
          }
      })</script>";
	}
}