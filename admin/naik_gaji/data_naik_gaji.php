<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Rekapitulasi KGB</li>
</ol>
<div class="card card-info">
	<!-- /.card-header -->
	<div class="card-body">
		<div>
			<a href="admin/naik_gaji/cetak_rkgb.php" class="btn btn-warning" target="_blank">
					<i class="fa bi bi-printer-fill"></i> Cetak Laporan Rekapiluasi KGB</button>
            </a>
		</div>
		<br>
		<div class="table-responsive">
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th>No</th>
						<th>Nip</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tmt</th>
						<th>Unit Organisasi</th>
						<th>Upload SK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$no = 1;
					if (isset($_POST['nip'])) {
						$nip = $_POST['nip'];
						$sql = mysqli_query($koneksi, "select * from tb_naik_gaji where nip='$nip'");
					} else {
						$sql = $koneksi->query("SELECT * from tb_naik_gaji");
					}
					while ($data = $sql->fetch_assoc()) {
				
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nip']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['jeniskelamin']; ?>
							</td>
							<td>
								<?php echo tgl_indo($data['tmt']); ?>
							</td>
							<td>
								<?php echo $data['unit']; ?>
							</td>
							<td>
							<a href="<?=('uploads/'.$data['upload']);?>" class="btn btn-primary btn-md" target="_blank">
							<i class="fa fa-fw fa-download"></i> Unduh</a>
							</td>


							<td>
								<a href="?page=edit-naik_gaji&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-naik_gaji&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->