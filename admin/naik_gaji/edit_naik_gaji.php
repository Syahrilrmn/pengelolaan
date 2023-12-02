<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_naik_gaji WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-naik_gaji">Data Pegawai Naik Gaji</a></li>
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
					 readonly/>
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
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-5">
					<select name="jeniskelamin" id="jeniskelamin" class="form-control">
						<option>- Pilih -</option>
						<?php
						if ($data_cek['jeniskelamin'] == "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
						else echo "<option value='Laki-laki'>Laki-laki</option>";
		
						if ($data_cek['jeniskelamin'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
						else echo "<option value='Perempuan'>Perempuan</option>";
					?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tmt" name="tmt" value="<?php echo $data_cek['tmt']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="unit" name="unit" value="<?php echo $data_cek['unit']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Sebelumnya</label>
				<div class="col-sm-5">
					<a href="<?=('uploads/'.$data_cek['upload']);?>" class="form-control" target="_blank" title="Lihat File"> <?php echo $data_cek['upload']; ?>
			    	</a>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload SK</label>
				<div class="col-sm-5"> 
				<label>Pilih file untuk diupload :</label><br>
				<input type="file" accept="application/pdf" class="form-control" name="upload" id="upload"><br>
				</div>
			</div>


		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-naik_gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

$sumber = @$_FILES['upload']['tmp_name'];
$target = 'uploads/';
$nama_file = @$_FILES['upload']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

	if(!empty($sumber)){
		$sql_ubah = "UPDATE tb_naik_gaji SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			jeniskelamin='".$_POST['jeniskelamin']."',
			tmt='".$_POST['tmt']."',
			unit='".$_POST['unit']."',
			upload='".$nama_file."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

	}elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_naik_gaji SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			jeniskelamin='".$_POST['jeniskelamin']."',
			tmt='".$_POST['tmt']."',
			unit='".$_POST['unit']."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
	}
	
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-naik_gaji';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-naik_gaji';
            }
        })</script>";
    }
}