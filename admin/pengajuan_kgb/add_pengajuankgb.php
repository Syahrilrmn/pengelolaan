<?php
$golongan 	= mysqli_query($koneksi, "SELECT * FROM tb_golongan");
$pangkat 	= mysqli_query($koneksi, "SELECT * FROM tb_pangkat");
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pkgb WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-pengajuankgb-02">Data Pegawai Naik Gaji</a></li>
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
				<label class="col-sm-2 col-form-label">Masa Kerja</label>
				<div class="col-sm-5">
                    <input type="number" class="form-control" id="masakerja" name="masakerja" value="<?php echo $data_cek['masakerja']; ?>" readonly>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Lama</label>
				<div class="col-sm-2">
                    <input type="number" class="form-control" id="gaji_before" name="gaji_before" value="<?php echo $data_cek['gaji_before']; ?>" readonly>
				</div>
                <div>
                    <span>
                    <?php echo rupiah($data_cek['gaji_before']); ?> (<?php echo terbilang($data_cek['gaji_before']); ?> rupiah) 
                    </span>
                </div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Baru</label>
				<div class="col-sm-5">
                    <input type="number" class="form-control" id="gaji_now" name="gaji_now" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $data_cek['unit']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload SK</label>
				<div class="col-sm-5">				
				<label>Pilih file SK yang sudah di tanda tangangi untuk diupload:</label><br>
				<input type="file" accept="application/pdf" class="form-control" name="upload" id="upload"><br>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengajuankgb-01" title="Kembali" class="btn btn-secondary">Batal</a>
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
			'".$_POST['jk']."',
			'".$_POST['tmt']."',
			'".$_POST['unit']."',
			'".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
		$sql_gaji = "UPDATE tb_data_gaji SET
			tmt='".$_POST['tmt']."',
			pangkat='".$_POST['pangkat']."',
			golongan='".$_POST['golongan']."',
			masakerja='".$_POST['masakerja']."',
			gaji_before='".$_POST['gaji_before']."',
            gaji_now='".$_POST['gaji_now']."'
            WHERE nip='".$_GET['kode']."'";
        $query_gaji = mysqli_query($koneksi, $sql_gaji);
        mysqli_close($koneksi);
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengajuankgb-01';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengajuankgb-01';
          }
      })</script>";
	}
	  }elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-pengajuankgb-01';
			}
		})</script>";
	  }
	}

