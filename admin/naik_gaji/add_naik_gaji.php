<?php
$pegawai 	= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$npegawai 	= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
$upegawai 	= mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-naik_gaji">Data Pegawai Naik Gaji</a></li>
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
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
				<select name="jeniskelamin" id="jeniskelamin" class="form-control">
						<option>- Pilih -</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select></div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tmt" name="tmt" placeholder="Tmt" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-5">
					<select name="unit" id="unit" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($upegawai)) { ?>
							<option value="<?= $row['unit'] ?>"><?= $row['unit'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload SK</label>
				<div class="col-sm-5">				
				<label>Pilih file untuk diupload:</label><br>
				<input type="file" accept="application/pdf" class="form-control" name="upload" id="upload"><br>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-naik_gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['upload']['tmp_name'];
	$target = 'uploads/';
	$nama_file = @$_FILES['upload']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){
	if(!empty($sumber)) {
        $sql_simpan = "INSERT INTO tb_naik_gaji (nip, nama, jeniskelamin, tmt, unit, upload) VALUES (
			'".$_POST['nip']."',
			'".$_POST['nama']."',
			'".$_POST['jeniskelamin']."',
			'".$_POST['tmt']."',
			'".$_POST['unit']."',
			'".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
		$sql_gaji = "UPDATE tb_data_gaji SET
			tmt='".$_POST['tmt']."',
			pangkat='".$_POST['pangkat']."',
			golongan='".$_POST['golongan']."',
			masakerja='".$_POST['masakerja']."',
			id_daftargaji='".$_POST['id_daftargaji']."'
            WHERE nip='".$_GET['kode']."'";
        $query_gaji = mysqli_query($koneksi, $sql_gaji);
        mysqli_close($koneksi);
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-naik_gaji';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-naik_gaji';
          }
      })</script>";
	}
	  }elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-naik_gaji';
			}
		})</script>";
	  }
	}

