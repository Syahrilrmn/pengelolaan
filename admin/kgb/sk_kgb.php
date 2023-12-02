<?php

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_pegawai WHERE nip='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
//nomor surat
$hari = date('d');
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun = date ('Y');
$nomor = "-PTK/Dipendik";
$no_dpn = "800.".$hari.".".$bulan.".".$tahun."/";

$sql_no = mysqli_query($koneksi, "SELECT max(id_kgb) as maxID FROM tb_kgb");
$data_no = mysqli_fetch_array($sql_no);
$no = $data_no['maxID'];
$noUrut = $no + 1;
$kode = sprintf("%02s", $noUrut);
$nomorbaru = $no_dpn.$kode.$nomor;

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
				<label class="col-sm-2 col-form-label">Nomor Surat</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="No Surat" value="<?php echo $nomorbaru;?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Perihal</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" required>
				</div>
			</div>	
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Surat</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama'];?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"  value="<?php echo $data_cek['tempat_lahir']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  value="<?php echo $data_cek['tanggal_lahir']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP / KARPEG</label>
				<div class="col-sm-7">
						<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip'];?>" readonly>	
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pangkat & Golong Ruang</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="pangkat" name="pangkat"  value="<?php echo $data_cek['pangkat']; ?>/<?php echo $data_cek['golongan']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Organisasi</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="unit" name="unit"  value="<?php echo $data_cek['unit']; ?>" readonly>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor SK / Tanggal SK</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="no_sk" name="no_sk" placeholder="Nomor SK / Tanggal SK" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Lama</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="masakerja" name="masakerja" placeholder="Masa Kerja Lama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok Lama</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="gajilama" name="gajilama" placeholder="Gaji Pokok Lama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Mulai Berlakunya Gaji</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Baru</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="masakerja_baru" name="masakerja_baru" placeholder="Masa kerja Baru" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Ruang</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan Ruang" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Pokok Baru</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="gajibaru" name="gajibaru" placeholder="Gaji Pokok Baru" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mulai Tanggal</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Mulai Tanggal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kenaikan Gaji Berkala Berikutnya</label>
				<div class="col-sm-7">
					<input type="date" class="form-control" id="tgl_kenaikan" name="tgl_kenaikan" placeholder="Kenaikan Gaji" required>
				</div>
			</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kgb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO tb_kgb (no_surat, perihal, tanggal_surat, nama , tempat_lahir, tanggal_lahir,
	nip, pangkat, jabatan, unit, pejabat, no_sk, masakerja, gajilama, tgl_mulai, gajibaru, golongan,
	masakerja_baru, tgl, tgl_kenaikan) VALUES (
      		'" . $_POST['no_surat'] . "',
      		'" . $_POST['perihal'] . "',
			'" . $_POST['tanggal_surat'] . "',
			'" . $_POST['nama'] . "',
			'" . $_POST['tempat_lahir'] . "',
			'" . $_POST['tanggal_lahir'] . "',
			'" . $_POST['nip'] . "',
			'" . $_POST['pangkat'] . "',
			'" . $_POST['jabatan'] . "',
			'" . $_POST['unit'] . "',
			'Nuryadi, S.Pd.,MA',
			'" . $_POST['no_sk'] . "',
			'" . $_POST['masakerja'] . "',
			'" . $_POST['gajilama'] . "',
			'" . $_POST['tgl_mulai'] . "',
			'" . $_POST['gajibaru'] . "',
			'" . $_POST['golongan'] . "',
			'" . $_POST['masakerja_baru'] . "',
			'" . $_POST['tgl'] . "',
			'" . $_POST['tgl_kenaikan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?data-kgb';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?data-kgb';
          }
      })</script>";
	}
}
