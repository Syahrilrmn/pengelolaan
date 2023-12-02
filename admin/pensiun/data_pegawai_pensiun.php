<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Pegawai Pengsiun</li>
</ol>
<div class="card card-info">
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th width="20px">No</th>
						<th>Nama guru</th>
						<th>nip</th>
						<th width="150px">Jenis Kelamin</th>
						<th width="30px">Usia</th>
						<th width="100px">TMT Kerja</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no =0;
					$sql = $koneksi->query("select * from tb_pensiun");
					while ($data= $sql->fetch_assoc()) {
                        $no++;
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
							<?php echo tgl_indo($data['tmt_kerja']); ?>
						</td>
						<td>
							<a href="?page=detail-pegawai-pensiun&kode=<?php echo $data['nip']; ?>" title="Detail"
							 class="btn btn-success btn-sm">
								<i class="fa fa-file"></i>
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