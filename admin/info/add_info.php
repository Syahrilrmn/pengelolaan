
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pengumuman</label>
				<div class="col-sm-5">
                    <input type="text" class="form-control" id="info" name="info" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Dari Tanggal</label>
				<div class="col-sm-5">
                    <input type="date" class="form-control" id="tanggal" name="dari_tgl" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Sampai Tanggal</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tanggal" name="sampai_tgl" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan/Catatan Pengumuman" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-info" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){

        $sql_simpan = "INSERT INTO tb_info (info, dari_tgl, sampai_tgl, ket) VALUES (
            '".$_POST['info']."',
			'".$_POST['dari_tgl']."',
			'".$_POST['sampai_tgl']."',
			'".$_POST['ket']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
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