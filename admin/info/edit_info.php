<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_info WHERE id_info='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pengumuman</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="info" name="info" value="<?php echo $data_cek['info']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Dari Tanggal</label>
				<div class="col-sm-5">
                    <input type="date" class="form-control" id="dari_tgl" name="dari_tgl" value="<?php echo $data_cek['dari_tgl']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Sampai Tanggal</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="sampai_tgl" name="sampai_tgl" value="<?php echo $data_cek['sampai_tgl']; ?>">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="ket" name="ket" value="<?php echo $data_cek['ket']; ?>">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-info">
			<a href="?page=data-info" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){

        $sql_ubah = "UPDATE tb_info SET
            info='".$_POST['info']."',
			dari_tgl='".$_POST['dari_tgl']."',
			sampai_tgl='".$_POST['sampai_tgl']."',
			ket='".$_POST['ket']."'
            WHERE id_info='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        mysqli_close($koneksi);

    if ($query_ubah) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-info';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-info';
          }
      })</script>";
	  }
	}