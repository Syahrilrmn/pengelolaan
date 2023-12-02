<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_pegawai WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Pegawai</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="row">
				<div class="card-body col-3">
					<div class="card-body">
						<img src="foto/<?php echo $data_cek['foto']; ?>" alt="" width="300px">
					</div>
				</div>
				<div class="card-body col-8">
					<div class="card-body">
						<table class="table">
							<tbody>
								<tr>
									<td style="width: 150px">
										<b>NIP</b>
									</td>
									<td>:
										<?php echo $data_cek['nip']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Nama</b>
									</td>
									<td>:
										<?php echo $data_cek['nama']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Karpeg</b>
									</td>
									<td>:
										<?php echo $data_cek['karpeg']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Jenis Kelamin</b>
									</td>
									<td>:
										<?php echo $data_cek['jk']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Tempat Lahir</b>
									</td>
									<td>:
										<?php echo $data_cek['tempat_lahir']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Tanggal Lahir</b>
									</td>
									<td>:
										<?php echo tgl_indo($data_cek['tanggal_lahir']); ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>TMT</b>
									</td>
									<td>:
										<?php echo tgl_indo($data_cek['tmt']); ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Pangkat/Golongan</b>
									</td>
									<td>:
										<?php echo $data_cek['pangkat']; ?>/<?php echo $data_cek['golongan']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Jabatan</b>
									</td>
									<td>:
										<?php echo $data_cek['jabatan']; ?>
									</td>
								</tr>
								<tr>
									<td style="width: 150px">
										<b>Unit Organisasi</b>
									</td>
									<td>:
										<?php echo $data_cek['unit']; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
				<div class="card-footer">
					<a href="?page=data-pegawai" class="btn btn-warning">Kembali</a>

					
				</div>
			</div>
		</div>
	</div>

</div>