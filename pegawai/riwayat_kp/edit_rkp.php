<?php

        $sql_cek = "SELECT * FROM tb_riwayatkp WHERE nip='$data_user'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $data_cek['tgl']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan sebelum</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="jabatan_sebelum" name="jabatan_sebelum" value="<?php echo $data_cek['jabatan_sebelum']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan setelah</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="jabatan_setelah" name="jabatan_setelah" value="<?php echo $data_cek['jabatan_setelah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="unit" name="unit" value="<?php echo $data_cek['unit']; ?>"
					/>
				</div>
			</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-rkp" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	
if (isset ($_POST['Ubah'])){

        $sql_ubah = "UPDATE tb_riwayatkp SET
            nip='".$_POST['nip']."',
            nama='".$_POST['nama']."',
			tgl='".$_POST['tgl']."',
			jabatan_sebelum='".$_POST['jabatan_sebelum']."',
			jabatan_setelah='".$_POST['jabatan_setelah']."',
			unit='".$_POST['unit']."'
            WHERE nip='$data_user'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-rkp';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-rkp';
            }
        })</script>";
    }
}

