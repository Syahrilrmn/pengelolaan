<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kgb WHERE id_kgb='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-kgb">Data Surat KBG</a></li>
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
				<label class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $data_cek['no_surat']; ?>"
					 readonly/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Perihal</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="perihal" name="perihal" value="<?php echo $data_cek['perihal']; ?>"
					/>
			</div>	
			</div>
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Surat</label>
				<div class="col-sm-7">
				<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?php echo $data_cek['tanggal_surat']; ?>"
					 readonly/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-7">
				<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data_cek['tanggal_lahir']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP / KARPEG</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat & Golong Ruang</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo $data_cek['pangkat']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="unit" name="unit" value="<?php echo $data_cek['unit']; ?>"
					/>
			</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor SK / Tanggal SK</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="no_sk" name="no_sk" value="<?php echo $data_cek['no_sk']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Lama</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="masakerja" name="masakerja" value="<?php echo $data_cek['masakerja']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok Lama</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="gajilama" name="gajilama" value="<?php echo $data_cek['gajilama']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Mulai Berlakunya Gaji</label>
				<div class="col-sm-7">
				<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?php echo $data_cek['tgl_mulai']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Baru</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="masakerja_baru" name="masakerja_baru" value="<?php echo $data_cek['masakerja_baru']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Ruang</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="golongan" name="golongan" value="<?php echo $data_cek['golongan']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok Baru</label>
				<div class="col-sm-7">
				<input type="text" class="form-control" id="gajibaru" name="gajibaru" value="<?php echo $data_cek['gajibaru']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mulai Tanggal</label>
				<div class="col-sm-7">
				<input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $data_cek['tgl']; ?>"
					/>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kenaikan Gaji Berkala Berikutnya</label>
				<div class="col-sm-7">
				<input type="date" class="form-control" id="tgl_kenaikan" name="tgl_kenaikan" value="<?php echo $data_cek['tgl_kenaikan']; ?>"
					/>
			</div>
			</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kgb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	
if (isset ($_POST['Ubah'])){


        $sql_ubah = "UPDATE tb_kgb SET
			no_surat='".$_POST['no_surat']."',
            perihal='".$_POST['perihal']."',
			tanggal_surat='".$_POST['tanggal_surat']."',
			nama='".$_POST['nama']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			nip='".$_POST['nip']."',
			pangkat='".$_POST['pangkat']."',
			jabatan='".$_POST['jabatan']."',
			unit='".$_POST['unit']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."',
			no_sk='".$_POST['no_sk']."',
			masakerja='".$_POST['masakerja']."',
			gajilama='".$_POST['gajilama']."',
			tgl_mulai='".$_POST['tgl_mulai']."',
			masakerja_baru='".$_POST['masakerja_baru']."',
			golongan='".$_POST['golongan']."',
			gajibaru='".$_POST['gajibaru']."',
			tgl='".$_POST['tgl']."',
			tgl_kenaikan='".$_POST['tgl_kenaikan']."'
            WHERE id_kgb='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kgb';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kgb';
            }
        })</script>";
    }
}

