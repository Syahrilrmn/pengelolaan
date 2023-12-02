<?php
$sql_cek = "SELECT * FROM tb_pegawai WHERE nip='$data_user'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-pengajuan-kgb">Data Pengajuan KGB</a></li>
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
                    <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" readonly>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
				    <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $data_cek['jk']; ?>" readonly>
			    </div>
            </div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tmt" name="tmt" value="<?php echo $data_cek['tmt']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo $data_cek['pangkat']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="golongan" name="golongan" value="<?php echo $data_cek['golongan']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">MKG</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="masakerja" name="masakerja">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji lama</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gaji_before" name="gaji_before">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $data_cek['unit']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-5 col-form-label">Upload Persyartan, Pilih file berbentuk pdf untuk diupload:</label>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Surat Pengantar dari Kepsek</label>
				<div class="col-sm-5">				
				<input type="file" accept="application/pdf" class="form-control" name="upload" id="upload"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">SK Pangkat terakhir</label>
				<div class="col-sm-5">				
				<input type="file" accept="application/pdf" class="form-control" name="sk_pangkat" id="sk_pangkat"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">SK Berkala terakhir</label>
				<div class="col-sm-5">				
				<input type="file" accept="application/pdf" class="form-control" name="sk_berkala" id="sk_berkala"><br>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengajuan-kgb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	//Surat Pengantar dari Kepsek
	$sumber 		= @$_FILES['upload']['tmp_name'];
	$target 		= 'uploads/';
	$nama_file 		= @$_FILES['upload']['name'];
	$pindah 		= move_uploaded_file($sumber, $target.$nama_file);
	//SK Pangkat terakhir
	$sumber_skpangkat 	= @$_FILES['sk_pangkat']['tmp_name'];
	$target_skpangkat 	= 'uploads/';
	$sk_pangkat 		= @$_FILES['sk_pangkat']['name'];
	$pindah_skpangkat 	= move_uploaded_file($sumber_skpangkat, $target_skpangkat.$sk_pangkat);
	//SK Pangkat terakhir
	$sumber_skberkala 	= @$_FILES['sk_berkala']['tmp_name'];
	$target_skberkala  	= 'uploads/';
	$sk_berkala 		= @$_FILES['sk_berkala']['name'];
	$pindah_skberkala  	= move_uploaded_file($sumber_skberkala , $target_skberkala .$sk_berkala);

    if (isset ($_POST['Simpan'])){
	if(!empty($sumber)) {
        $sql_simpan = "INSERT INTO tb_pkgb (nip, nama, jk, tmt, pangkat, golongan, jabatan, masakerja, gaji_before, unit, upload, sk_pangkat, sk_berkala, ket) VALUES (
			'".$_POST['nip']."',
			'".$_POST['nama']."',
			'".$_POST['jk']."',
			'".$_POST['tmt']."',
			'".$_POST['pangkat']."',
			'".$_POST['golongan']."',
			'".$_POST['jabatan']."',
			'".$_POST['masakerja']."',
			'".$_POST['gaji_before']."',
			'".$_POST['unit']."',
			'".$nama_file."',
			'".$sk_pangkat."',
			'".$sk_berkala."',
            'PENDING')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengajuan-kgb';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengajuan-kgb';
          }
      })</script>";
	}
	  }elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-pengajuan-kgb';
			}
		})</script>";
	  }
	}

