<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Permohonan Surat KBG</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">

			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th width="20px">No</th>
						<th>Nomor Surat</th>
						<th>Tanggal Surat</th>
						<th>TTL</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no =0;
					$sql = $koneksi->query("select * from tb_kgb WHERE NIP='$data_user'");
					while ($data= $sql->fetch_assoc()) {
                        $no++;
					?>

					<tr>
						<td>
							<?php echo $no; ?>
						</td>
						<td>
							<?php echo $data['no_surat']; ?>
						</td>
						<td>
							<?php echo tgl_indo($data['tanggal_surat']); ?>
						</td>
						<td>
							<?php echo $data['tempat_lahir'];?>, <?php echo tgl_indo($data['tanggal_lahir']); ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<a href="admin/kgb/cetak_kgb.php?kode=<?php echo $data['id_kgb']; ?>" 
							title="Cetak" class="btn btn-info btn-sm" target="_blank">cetak
                                    <i class="fa fa-print"></i>
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