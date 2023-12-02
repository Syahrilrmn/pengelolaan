<?php
        $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna ='$data_id'";
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
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_nama ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" value="<?php echo $data_user ?>"
					readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_pass ?>"
					/>
					<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
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
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
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
      $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='".$_POST['nama_pengguna']."',
        username='".$_POST['username']."',
        password='".$_POST['password']."',
        foto='".$nama_file."'
        WHERE id_pengguna='$data_id'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);
    }elseif(empty($sumber)){
      $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='".$_POST['nama_pengguna']."',
        username='".$_POST['username']."',
        password='".$_POST['password']."'
        WHERE id_pengguna='$data_id'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);
    }
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'logout.php';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php';
        }
      })</script>";
    }}
?>

<script type="text/javascript">
    function change()
    {
    var x = document.getElementById('pass').type;

    if (x == 'password')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>