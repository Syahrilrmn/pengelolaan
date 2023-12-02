<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Pengajuan Pengsiun</li>
</ol>
<div class="card card-info">
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th width="20px">No</th>
						<th>Nama</th>
						<th>NIP</th>
						<th width="150px">Jenis Kelamin</th>
						<th width="30px">Usia</th>
						<th width="100px">TMT Kerja</th>
						<th width="100px">Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no =0;
					$sql = $koneksi->query("select * from tb_ppensiun");
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
                            <a href="?page=edit-pengajuan-pensiun-01&kode=<?php echo $data['nip']; ?>">
                                <?php echo $data['ket']; ?>
                                </a>
						</td>
						<td>
							<a href="?page=detail-pengajuan-pensiun-01&kode=<?php echo $data['nip']; ?>" title="Detail"
							 class="btn btn-primary btn-sm">
								<i class="fa fa-eye"></i> Detail
							</a>
							<a href="?page=add-pegawai-pensiun&kode=<?php echo $data['nip']; ?>" title="Proses"
							     class="btn btn-success btn-sm">
								<i class="fa fa-fw fa-plus"></i></a>
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