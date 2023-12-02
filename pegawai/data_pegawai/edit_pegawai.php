<?php

        $sql_cek = "SELECT * FROM tb_pegawai WHERE nip='$data_user'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

		$golongan 	= mysqli_query($koneksi, "SELECT * FROM tb_golongan");
		$pangkat 	= mysqli_query($koneksi, "SELECT * FROM tb_pangkat");
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
				<label class="col-sm-2 col-form-label">Karpeg</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="karpeg" name="karpeg" value="<?php echo $data_cek['karpeg']; ?>"
					/>
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
				<label class="col-sm-2 col-form-label">TMT</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tmt" name="tmt" value="<?php echo $data_cek['tmt']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat</label>
				<div class="col-sm-5">
					<i>Pangkat sebelumnya <?php echo $data_cek['pangkat'];?></i>
					<select name="pangkat" id="pangkat" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($pangkat)) { ?>
							<option value="<?= $row['pangkat'] ?>"><?= $row['pangkat'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan</label>
				<div class="col-sm-5">
					<i>Golongan sebelumnya <?php echo $data_cek['golongan'];?></i>
					<select name="golongan" id="golongan" class="form-control" required>
						<?php while ($row = mysqli_fetch_array($golongan)) { ?>
							<option value="<?= $row['golongan'] ?>"><?= $row['golongan'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>"
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
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
			<a href="?page=tampil-data" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	
if (isset ($_POST['Ubah'])){
	if(!empty($sumber)){
		$sql_ubah = "UPDATE tb_pegawai SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			karpeg='".$_POST['karpeg']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."',
			pangkat='".$_POST['pangkat']."',
			golongan='".$_POST['golongan']."',
			jabatan='".$_POST['jabatan']."',
			unit='".$_POST['unit']."',
			tmt='".$_POST['tmt']."',
			foto='".$nama_file."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

	}elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_pegawai SET
			nip='".$_POST['nip']."',
			nama='".$_POST['nama']."',
			karpeg='".$_POST['karpeg']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."',
			pangkat='".$_POST['pangkat']."',
			golongan='".$_POST['golongan']."',
			jabatan='".$_POST['jabatan']."',
			unit='".$_POST['unit']."',
			tmt='".$_POST['tmt']."'
            WHERE nip='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
	}
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=tampil-data';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=tampil-data';
            }
        })</script>";
    }
}

