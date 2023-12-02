<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_data_gaji WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-gaji">Data Gaji</a></li>
    <li class="breadcrumb-item active">Edit Data</li>
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
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tmt" name="tmt" value="<?php echo $data_cek['tmt']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo $data_cek['pangkat']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Ruang</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="golongan" name="golongan" value="<?php echo $data_cek['golongan']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Golongan</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="masakerja" name="masakerja" value="<?php echo $data_cek['masakerja']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji lama</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="gaji_before" name="gaji_before" value="<?php echo $data_cek['gaji_before']; ?>">
				</div>
				<div>
					<span><i>(<?php echo terbilang($data_cek['gaji_before']); ?> rupiah)</i></span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Sekarang</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="gaji_now" name="gaji_now" value="<?php echo $data_cek['gaji_now']; ?>">
				</div>
				<div>
					<span><i>(<?php echo terbilang($data_cek['gaji_now']); ?> rupiah)</i></span>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="ubah" value="ubah" class="btn btn-info">
			<a href="?page=data-gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	
if (isset ($_POST['ubah'])){


        $sql_ubah = "UPDATE tb_data_gaji SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			tmt='".$_POST['tmt']."',
			pangkat='".$_POST['pangkat']."',
			golongan='".$_POST['golongan']."',
			masakerja='".$_POST['masakerja']."',
			gaji_before='".$_POST['gaji_before']."',
			gaji_now='".$_POST['gaji_now']."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-gaji';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-gaji';
            }
        })</script>";
    }
}

