<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Pengajuan KGB</li>
</ol>
<div class="card card-info">
	<!-- /.card-header -->
	<div class="card-body">
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
						<th>MKG</th>
						<th>Gaji Lama</th>
                        <th>Unduk Berkas</th>
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
								<a href="?page=detail-pengajuankgb-02&kode=<?php echo $data['nip']; ?>" title="Proses"
							        class="btn btn-primary btn-sm">
								    <i class="fa fa-eye"></i> Lihat
							    </a>
							</td>
							<td>
							    <a href="?page=edit-pengajuankgb-02&kode=<?php echo $data['nip']; ?>">
                                <?php echo $data['ket']; ?>
                                </a>
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