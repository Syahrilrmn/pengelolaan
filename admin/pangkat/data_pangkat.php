<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Data Pangkat</li>
</ol>

<div class="card card-info">

	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pangkat" class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah Data</a>
                <a href="admin/pangkat/cetak_pangkat.php" class="btn btn-warning" target="_blank">
					<i class="fa bi bi-printer-fill"></i> Cetak pangkat</a>
			</div>
			<br>
			<span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th width="30px">No</th>
						<th>Nama Pangkat</th>
						<th width="100px">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					if (isset($_POST['new_pangkat'])) {
						$new_pangkat = $_POST['new_pangkat'];
						$sql = mysqli_query($koneksi, "select * from tb_pangkat where new_pangkat='$new_pangkat'");
					} else {
						$sql = $koneksi->query("SELECT * from tb_pangkat");
					}
					while ($data = $sql->fetch_assoc()) {
				
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['pangkat']; ?>
							</td>

							<td>
								<a href="?page=edit-pangkat&kode=<?php echo $data['id_pangkat']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pangkat&kode=<?php echo $data['id_pangkat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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

			<!-- /.<a href="./report/cetak-data-pangkat.php" title="Cetak Data Pangkat" class="btn btn-primary">Print</a> -->
			</div>
		</div>
	</div> 


	<!-- /.card-body -->