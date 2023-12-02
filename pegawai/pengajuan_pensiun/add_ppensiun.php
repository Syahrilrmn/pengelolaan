<?php
$sql_cek = "SELECT * FROM tb_pegawai WHERE nip='$data_user'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NIP</label>
				<div class="col-sm-6">
                    <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tempat Lahir</label>
				<div class="col-sm-6">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data_cek['tanggal_lahir']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
                    <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $data_cek['jk']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Usia</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="usia" name="usia" placeholder="Masukan Usia" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Mulai Terhitung Kinerja</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tmt_kerja" name="tmt_kerja" value="<?php echo $data_cek['tmt']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Gaji Pokok</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="gapok" name="gapok" placeholder="Contoh RP. 2000.000,-" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nomor Rekening</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="no_rek" name="no_rek" placeholder="Masukkan Nomor Rekening Gaji" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-3 col-form-label">Alasan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukkan Alasan pensiun" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-5 col-form-label">Upload Persyartan, Pilih file berbentuk pdf untuk diupload:</label>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Surat Permohonan PNS yang bersangkutan</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload" id="upload"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Surat Usul SKPD</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload1" id="upload1"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Data Perorangan Calon Penerima Pensiun (DCPC)</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload2" id="upload2"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">SK CPNS</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload3" id="upload3"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">SK PNS</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload4" id="upload4"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">SK Pangkat Terakhir</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload5" id="upload5"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">SK Jabatan Terakhir</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload6" id="upload6"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Daftar Susunan keluarga dari Lurah</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload7" id="upload7"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">SK PMK (Peninjauan Masa Kerja)</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload8" id="upload8"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Surat Nikah (disahkan KUA)</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload9" id="upload9"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">KTP Istri / Suami</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload10" id="upload10"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Akta Kelahiran Anak (disahkan Disdukcapil)</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload11" id="upload11"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Surat Keterangan Kuliah dari Fakultas</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload12" id="upload12"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">SKP 1 tahun terakhir</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload13" id="upload13"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Surat Pernyataan tidak pernah dijatuhi hukuman disiplin tingkat sedang/berat</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload14" id="upload14"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Surat Pernyataan tidak sedang menjalani proses Pidana atau pernah dipidana</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload15" id="upload15"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Pasfoto berwarna 3x4</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload16" id="upload16"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">eKTP (Kartu Tanda Penduduk)</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload17" id="upload17"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NPWP</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload18" id="upload18"><br>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Buku Tabungan</label>
				<div class="col-sm-6">				
				<input type="file" accept="application/pdf" class="form-control" name="upload19" id="upload19"><br>
				</div>
			</div>
			


		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengajuan-pensiun" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

$sumber 		= @$_FILES['upload']['tmp_name'];
$target 		= 'uploads/';
$nama_file 		= @$_FILES['upload']['name'];
$pindah 		= move_uploaded_file($sumber, $target.$nama_file);

$sumber1 		= @$_FILES['upload1']['tmp_name'];
$target1 		= 'uploads/';
$nama_file1 	= @$_FILES['upload1']['name'];
$pindah1 		= move_uploaded_file($sumber1, $target1.$nama_file1);

$sumber2 		= @$_FILES['upload2']['tmp_name'];
$target2 		= 'uploads/';
$nama_file2 	= @$_FILES['upload2']['name'];
$pindah2 		= move_uploaded_file($sumber2, $target2.$nama_file2);

$sumber3 		= @$_FILES['upload3']['tmp_name'];
$target3 		= 'uploads/';
$nama_file3 	= @$_FILES['upload3']['name'];
$pindah3 		= move_uploaded_file($sumber3, $target3.$nama_file3);

$sumber4 		= @$_FILES['upload4']['tmp_name'];
$target4 		= 'uploads/';
$nama_file4 	= @$_FILES['upload4']['name'];
$pindah4 		= move_uploaded_file($sumber4, $target4.$nama_file4);

$sumber5 		= @$_FILES['upload5']['tmp_name'];
$target5 		= 'uploads/';
$nama_file5 	= @$_FILES['upload5']['name'];
$pindah5 		= move_uploaded_file($sumber5, $target5.$nama_file5);

$sumber6 		= @$_FILES['upload6']['tmp_name'];
$target6 		= 'uploads/';
$nama_file6 	= @$_FILES['upload6']['name'];
$pindah6 		= move_uploaded_file($sumber6, $target6.$nama_file6);

$sumber7 		= @$_FILES['upload7']['tmp_name'];
$target7 		= 'uploads/';
$nama_file7 	= @$_FILES['upload7']['name'];
$pindah7 		= move_uploaded_file($sumber7, $target7.$nama_file7);

$sumber8	 	= @$_FILES['upload8']['tmp_name'];
$target8	 	= 'uploads/';
$nama_file8 	= @$_FILES['upload8']['name'];
$pindah8	 	= move_uploaded_file($sumber8, $target8.$nama_file8);

$sumber9 		= @$_FILES['upload9']['tmp_name'];
$target9 		= 'uploads/';
$nama_file9 	= @$_FILES['upload9']['name'];
$pindah9 		= move_uploaded_file($sumber9, $target9.$nama_file9);

$sumber10 		= @$_FILES['upload10']['tmp_name'];
$target10 		= 'uploads/';
$nama_file10 	= @$_FILES['upload10']['name'];
$pindah10 		= move_uploaded_file($sumber10, $target10.$nama_file10);

$sumber11 		= @$_FILES['upload11']['tmp_name'];
$target11 		= 'uploads/';
$nama_file11 	= @$_FILES['upload11']['name'];
$pindah11 		= move_uploaded_file($sumber11, $target11.$nama_file11);

$sumber12 		= @$_FILES['upload12']['tmp_name'];
$target12 		= 'uploads/';
$nama_file12 	= @$_FILES['upload12']['name'];
$pindah12 		= move_uploaded_file($sumber12, $target12.$nama_file12);

$sumber13 		= @$_FILES['upload13']['tmp_name'];
$target13 		= 'uploads/';
$nama_file13 	= @$_FILES['upload13']['name'];
$pindah13 		= move_uploaded_file($sumber13, $target13.$nama_file13);

$sumber14 		= @$_FILES['upload14']['tmp_name'];
$target14 		= 'uploads/';
$nama_file14 	= @$_FILES['upload14']['name'];
$pindah14 		= move_uploaded_file($sumber14, $target14.$nama_file14);

$sumber15 		= @$_FILES['upload15']['tmp_name'];
$target15 		= 'uploads/';
$nama_file15 	= @$_FILES['upload15']['name'];
$pindah15 		= move_uploaded_file($sumber15, $target15.$nama_file15);

$sumber16 		= @$_FILES['upload16']['tmp_name'];
$target16 		= 'uploads/';
$nama_file16 	= @$_FILES['upload16']['name'];
$pindah16 		= move_uploaded_file($sumber16, $target16.$nama_file16);

$sumber17	 	= @$_FILES['upload17']['tmp_name'];
$target17	 	= 'uploads/';
$nama_file17 	= @$_FILES['upload17']['name'];
$pindah17	 	= move_uploaded_file($sumber17, $target17.$nama_file17);

$sumber18	 	= @$_FILES['upload18']['tmp_name'];
$target18	 	= 'uploads/';
$nama_file18 	= @$_FILES['upload18']['name'];
$pindah18	 	= move_uploaded_file($sumber18, $target18.$nama_file18);

$sumber19	 	= @$_FILES['upload19']['tmp_name'];
$target19	 	= 'uploads/';
$nama_file19 	= @$_FILES['upload19']['name'];
$pindah19	 	= move_uploaded_file($sumber19, $target19.$nama_file19);

if (isset($_POST['Simpan'])) {

 		$sql_simpan = "INSERT INTO tb_ppensiun (
			 nip, nama, tempat_lahir, tanggal_lahir, jk, usia, tmt_kinerja, gapok, no_rek, alasan, upload,
			 upload1, upload2, upload3, upload4, upload5, upload6, upload7, upload8, upload9, upload10, upload11,
			 upload12, upload13, upload14, upload15, upload16, upload17, upload18, upload19, ket) VALUES (
         	'" . $_POST['nip'] . "',
		 	'" . $_POST['nama'] . "',
	     	'" . $_POST['tempat_lahir'] . "',
		 	'" . $_POST['tanggal_lahir'] . "',
			'" . $_POST['jk'] . "',
			'" . $_POST['usia'] . "',
			'" . $_POST['tmt_kerja'] . "',
			'" . $_POST['gapok'] . "',
			'" . $_POST['no_rek'] . "',
            '" . $_POST['alasan'] . "',
			'".$nama_file."',
			'".$nama_file1."',
			'".$nama_file2."',
			'".$nama_file3."',
			'".$nama_file4."',
			'".$nama_file5."',
			'".$nama_file6."',
			'".$nama_file7."',
			'".$nama_file8."',
			'".$nama_file9."',
			'".$nama_file10."',
			'".$nama_file11."',
			'".$nama_file12."',
			'".$nama_file13."',
			'".$nama_file14."',
			'".$nama_file15."',
			'".$nama_file16."',
			'".$nama_file17."',
			'".$nama_file18."',
			'".$nama_file19."',
         	'PENDING')";
 		$query_simpan = mysqli_query($koneksi, $sql_simpan);
 		mysqli_close($koneksi);

 		if ($query_simpan) {
 			echo "<script>
       Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
       }).then((result) => {if (result.value){
           window.location = 'index.php?page=data-pengajuan-pensiun';
           }
       })</script>";
 		} else {
 			echo "<script>
       Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
       }).then((result) => {if (result.value){
           window.location = 'index.php?page=add-pengajuan-pengsiun';
           }
       })</script>";
 		}
 }
