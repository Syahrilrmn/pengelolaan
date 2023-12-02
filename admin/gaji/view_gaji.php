<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_data_gaji WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
	
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-gaji">Data Gaji</a></li>
    <li class="breadcrumb-item active">Tampil Data</li>
</ol>
<div class="row">

	<div class="col">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Gaji</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
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
								<b>NIP</b>
							</td>
							<td>:
								<?php echo $data_cek['nip']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Tmt</b>
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
								<b>Masakerja</b>
							</td>
							<td>:
								<?php echo $data_cek['masakerja']; ?> Tahun
							</td>
						</tr>
						
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-gaji" class="btn btn-warning">Kembali</a>

				</div>
			</div>
		</div>
	</div>

	

</div>