<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">SK KGB</li>
</ol>
<div class="card card-info">

	<div class="card-body">
		<div class="table-responsive">
            <div>
				<label>Data Pegawai yang mengajukan KBG</label>
			</div>
			<br>
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th>No</th>
						<th>Nip</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tmt</th>
						<th>MKG</th>
						<th>Gaji Lama</th>
                        <th>Aksi</th>
						<th>Ket</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$no = 1;
					if (isset($_POST['nip'])) {
						$nip = $_POST['nip'];
						$sql = mysqli_query($koneksi, "select * from tb_pkgb where nip='$nip'");
					} else {
						$sql = $koneksi->query("SELECT * from tb_pkgb");
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
								<?php echo $data['jk']; ?>
							</td>
							<td>
								<?php echo tgl_indo($data['tmt']); ?>
							</td>
							<td>
								<?php echo $data['masakerja']; ?>
							</td>
							<td>
								<?php echo rupiah($data['gaji_before']); ?>
							</td>
                            <td>
								<a href="?page=tambah_skkgb&kode=<?php echo $data['nip']; ?>" title="Proses"
							        class="btn btn-success btn-sm">
								    <i class="fa fa-fw fa-plus"></i> Tambah SK</a>
							    </a>
							</td>
							<td>
                                <?php echo $data['ket']; ?>
							</td>
							
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>

	<div class="card-body">
		<div class="table-responsive">
			<div>
				<label>Data SK KBG</label>
			</div>
			<br>
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th>No</th>
						<th>Nomor Surat</th>
						<th>Tanggal Surat</th>
						<th>Nip</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					if (isset($_POST['new_kgb'])) {
						$new_kgb = $_POST['new_kgb'];
						$sql = mysqli_query($koneksi, "select * from tb_kgb where new_kgb='$new_kgb'");
					} else {
						$sql = $koneksi->query("SELECT * from tb_kgb");
					}
					while ($data = $sql->fetch_assoc()) {
				
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_surat']; ?>
							</td>
							<td>
								<?php echo tgl_indo($data['tanggal_surat']); ?>
							</td>
							<td>
								<?php echo $data['nip']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>

							<td>
								<a href="?page=view-kgb&kode=<?php echo $data['id_kgb']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								</a>
								<a href="?page=edit-kgb&kode=<?php echo $data['id_kgb']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="admin/kgb/cetak_kgb.php?kode=<?php echo $data['id_kgb']; ?>" title="Cetak" class="btn btn-info btn-sm" target="_blank">
                                    <i class="fa bi bi-printer"></i>
                                </a>
								<a href="?page=del-kgb&kode=<?php echo $data['id_kgb']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
			<div class="card-footer">

				<!-- /. <a href="./report/cetak-data-kgb.php" title="Cetak Surat KGB" class="btn btn-primary">Print</a> -->
			</div>
		</div>
	</div>


	<!-- /.card-body -->