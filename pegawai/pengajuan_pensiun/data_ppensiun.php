<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Permohonan Pensiun</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pengajuan-pensiun" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th width="20px">No</th>
						<th>Nama guru</th>
						<th>nip</th>
						<th>Jenis Kelamin</th>
						<th width="30px">Usia</th>
						<th width="100px">TMT Kerja</th>
						<th width="100px">Keterangan</th>
						<th width="80px">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no =0;
					$sql = $koneksi->query("select * from tb_ppensiun WHERE nip='$data_user'");
					while ($data= $sql->fetch_assoc()) {
                        $no++;
                        $tanggalL       = $data['tanggal_lahir'];
                        $tgl_lahir      = tgl_indo($tanggalL);
                        $tanggalK       = $data['tmt_kinerja'];
                        $tmt_kerja      = tgl_indo($tanggalK);
					?>

					<tr>
						<td>
							<?php echo $no; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['jk']; ?>
						</td>
						<td>
							<?php echo $data['usia']; ?>
						</td>
						<td>
							<?php echo $tmt_kerja; ?>
						</td>
						<td>
							<?php echo $data['ket']; ?>
						</td>
						<td>
							<a href="?page=detail-pengajuan-pensiun&kode=<?php echo $data['nip']; ?>" title="Detail"
							 class="btn btn-success btn-sm">
								<i class="fa fa-file"></i>
							</a>
							<a href="?page=del-pengajuan-pensiun&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
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
		</div>
	</div>
	<!-- /.card-body -->