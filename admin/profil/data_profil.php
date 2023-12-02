<div class="card card-info">
	<div class="card-header">
	<h3 class="card-title">
		<i class="fa fa-table"></i> Profil Dinas Pendidikan
	</h3>
	</div>
<!-- /.card-header -->
<div class="card-body">
	<div class="table-responsive">
		<div>
		<a href="?page=add-kadis" class="btn btn-primary">
		<i class="fa fa-plus"></i> Tambah Kadis</a>
		</div><br>
		<table id="" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama Kadis</th>
					<th>NIP</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>TTL</th>
					<th>Kelola</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$sql = $koneksi->query("select * from tb_kadis");
				while ($data = $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['jk']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lahir']; ?>, <?php echo tgl_indo($data['tanggal_lahir']); ?>
						</td>
						<td>
							<a href="?page=edit-kadis&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-wrench"></i>
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

	<div class="table-responsive">
		<div>
		<a href="?page=add-profil" class="btn btn-primary">
		<i class="fa fa-plus"></i> Tambah Profil</a>
		</div><br>
		<table id="" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama Pemerintahan</th>
					<th>Nama Dinas</th>
					<th>Alamat</th>
					<th>Bidang</th>
					<th>Kelola</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$sql = $koneksi->query("select * from tb_profil");
				while ($data = $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $data['nama_pemerintahan']; ?>
						</td>
						<td>
							<?php echo $data['nama_dinas']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['bidang']; ?>
						</td>
						<td>
							<a href="?page=edit-profil&kode=<?php echo $data['id_profil']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-wrench"></i>
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