<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Riwayat Kenaikan Pangkat
		</h3>
	</div>
	

	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-rkp" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data</a>
			</div>
			<br>
			<span style="margin-left:1000px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
					<th>No</th>
						<th>Tmt</th>
						<th>Nama</th>
						<th>Jabatan Sebelum</th>
						<th>Jabatan Setelah</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
                    $sql = mysqli_query($koneksi, "select * from tb_riwayatkp where NIP='$data_user'");
					while ($data = $sql->fetch_assoc()) {
				
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo tgl_indo ($data['tgl']); ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['jabatan_sebelum']; ?>
							</td>
							<td>
								<?php echo $data['jabatan_setelah']; ?>
							</td>

							<td>
								<a href="?page=view-rkp" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								</a>
								<a href="?page=edit-rkp" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-riwayatkp&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
			<div class="card-footer">

				<!-- /. <a href="./report/cetak-data-riwayatkp.php" title="Cetak Data Riwayat kenaikan Pangkat" class="btn btn-primary">Print</a> -->
			</div>
		</div>
	</div>


	<!-- /.card-body -->