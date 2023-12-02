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
    <li class="breadcrumb-item active">Tambah Data</li>
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
				<label class="col-sm-2 col-form-label">Masa Kerja Golongan</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="masakerja" name="masakerja" placeholder="Masukan Masa Kerja" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji lama</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gaji_before" name="gaji_before" placeholder="Masukan gaji lama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Sekarang</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gaji_now" name="gaji_now" placeholder="Masukan gaji Sekarang" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="tambah" value="Tambah" class="btn btn-info">
			<a href="?page=data-gaji" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	
if (isset ($_POST['tambah'])){


        $sql_tambah = "UPDATE tb_data_gaji SET
			masakerja='".$_POST['masakerja']."',
			gaji_before='".$_POST['gaji_before']."',
			gaji_now='".$_POST['gaji_now']."'
            WHERE nip='".$_GET['kode']."'";
        $query_tambah = mysqli_query($koneksi, $sql_tambah);
    if ($query_tambah) {
        echo "<script>
        Swal.fire({title: 'tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-gaji';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add-gaji';
            }
        })</script>";
    }
}

