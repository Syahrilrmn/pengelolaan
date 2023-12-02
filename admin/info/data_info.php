
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Tabel Daftar Pengumuman
		</h3>
	</div>

	<div class="card-body">
		<div class="table-responsive">
            <div>
                <a href="?page=add-info" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Pengumuman</a>
                <a href="?page=tampil-info" class="btn btn-success">
                    <i class="fa fa-eye"></i> Tampilkan Pengumuman</a>
            </div>
			<br>
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
					<th>No</th>	
						<th>Nama Pengumuman</th>
						<th>Dari Tanggal</th>
						<th>Sampai Tanggal</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_info");
					while ($data= $sql->fetch_assoc()) {	
				
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['info']; ?>
							</td>
							<td>
								<?php echo tgl_indo($data['dari_tgl']); ?>
							</td>
							<td>
								<?php echo tgl_indo($data['sampai_tgl']); ?>
							</td>
							<td>
								<?php echo $data['ket']; ?> 
							</td>

							<td>
								</a>
								<a href="?page=edit-info&kode=<?php echo $data['id_info']; ?>" 
                                title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-info&kode=<?php echo $data['id_info']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" 
                                title="Hapus" class="btn btn-danger btn-sm">
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

				<!-- /. <a href="./report/cetak-data-info.php" title="Cetak Data info" class="btn btn-primary">Print</a> -->
			</div>
		</div>
	</div>


	<!-- /.card-body -->