<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Daftar Gaji</li>
</ol>

<div class="card card-info">	

	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-daftargaji" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data</a>
			</div>
			<br>
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th width="30px">No</th>
						<th width="30px">Kode</th>
						<th width="80px">MKG</th>
						<th>Pangkat</th>
						<th>Golongan</th>
						<th>Gaji Sebelumnya</th>
						<th>Gaji Sekarang</th>
						<th width="100px">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					if (isset($_POST['new_daftargaji'])) {
						$new_daftargaji = $_POST['new_daftargaji'];
						$sql = mysqli_query($koneksi, "select * from tb_daftargaji where new_daftargaji='$new_daftargaji'");
					} else {
						$sql = $koneksi->query("SELECT * from tb_daftargaji");
					}
					while ($data = $sql->fetch_assoc()) {
				
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_daftargaji']; ?>
							</td>
							<td>
								<?php echo $data['mkg']; ?> Tahun
							</td>
							<td>
								<?php echo $data['pangkat']; ?>
							</td>
							<td>
								<?php echo $data['golongan']; ?>
							</td>
							<td>
								<?php echo rupiah($data['gaji_before']); ?>
							</td>
							<td>
								<?php echo rupiah($data['gaji_now']); ?>
							</td>

							<td>
								<a href="?page=edit-daftargaji&kode=<?php echo $data['id_daftargaji']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=update-daftargaji&kode=<?php echo $data['id_daftargaji']; ?>" title="Update" class="btn btn-warning btn-sm">
									<i class="fa bi bi-capslock"></i>
								</a>
								<a href="?page=del-daftargaji&kode=<?php echo $data['id_daftargaji']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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

			<!-- /.<a href="./report/cetak-data-daftargaji.php" title="Cetak Daftar Gaji" class="btn btn-primary">Print</a> -->
			</div>
		</div>
	</div> 


	<!-- /.card-body -->