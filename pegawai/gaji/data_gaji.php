<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Data Gaji</li>
</ol>
<div class="card card-info">
	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th width="10px">No</th>	
						<th>Nama </th>
						<th>nip</th>
						<th>Tmt</th>
						<th>MKG</th>
						<th>Gaji Lama</th>
						<th>Gaji Baru</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_data_gaji WHERE nip='$data_user'");
					while ($data= $sql->fetch_assoc()) {
                        $no;
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['nip']; ?>
							</td>
							<td>
								<?php echo tgl_indo($data['tmt']); ?>
							</td>
							<td>
								<?php echo $data['masakerja']; ?> Tahun
							</td>
							<td>
								<?php echo rupiah($data['gaji_before']); ?>
							</td>
							<td>
								<?php echo rupiah($data['gaji_now']); ?>
							</td>

							<td>
								<a href="?page=tampil-gajip&kode=<?php echo $data['nip']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
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

				<!-- /. <a href="./report/cetak-data-gaji.php" title="Cetak Data Gaji" class="btn btn-primary">Print</a> -->
			</div>
		</div>
	</div>


	<!-- /.card-body -->