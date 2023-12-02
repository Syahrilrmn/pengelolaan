<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kadis WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-kadis">Data kadis</a></li>
    <li class="breadcrumb-item active">Edit Data</li>
</ol>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					 />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
					<select class="form-control" name="jk" id="jk" required>
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data_cek['tanggal_lahir']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-5">
					<input type="file" class="form-control" id="upload" name="upload">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Sebelumnya</label>
				<div class="col-sm-5">
				   <img src="foto/<?php echo $data_cek['foto']; ?>" 
					 alt="aktor" height="120" width="80" style="border: 2px solid #666666;">
				</div>
			</div>

		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-profil" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

$sumber = @$_FILES['upload']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['upload']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);
	
if (isset ($_POST['Ubah'])){

	if(!empty($sumber)){
		$sql_ubah = "UPDATE tb_kadis SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			alamat='".$_POST['alamat']."',
			jk='".$_POST['jk']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."',
			foto='".$nama_file."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

	}elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_kadis SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			alamat='".$_POST['alamat']."',
			jk='".$_POST['jk']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
	}
	
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php';
            }
        })</script>";
    }
}