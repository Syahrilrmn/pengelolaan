<?php
$pegawai 	= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$npegawai 	= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$tmt 		= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-riwayatkp">Data Riwayat Kenaikan Pangkat</a></li>
    <li class="breadcrumb-item active">Tambah Data</li>
</ol>
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
					<select name="nip" id="nip" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($pegawai)) { ?>
							<option value="<?= $row['nip'] ?>"><?= $row['nip'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<select name="nama" id="nama" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($npegawai)) { ?>
							<option value="<?= $row['nama'] ?>"><?= $row['nama'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<select name="tgl" id="tgl" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($tmt)) { ?>
							<option value="<?= $row['tmt'] ?>"><?= $row['tmt'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan Sekarang</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan_setelah" name="jabatan_setelah" placeholder="Jabatan Setelah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="unit" name="unit" placeholder="Unit Organisasi" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-riwayatkp" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){

        $sql_simpan = "INSERT INTO tb_riwayatkp (nip, nama, tgl, jabatan_setelah, unit, Jabatan_sebelum) VALUES (
      '".$_POST['nip']."',
			'".$_POST['nama']."',
			'".$_POST['tgl']."',
			'".$_POST['jabatan_setelah']."',
			'".$_POST['unit']."',
			'-')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-riwayatkp';
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
