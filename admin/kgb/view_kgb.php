<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_kgb WHERE id_kgb='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-kgb">Data Surat KBG</a></li>
    <li class="breadcrumb-item active">Detail Surat</li>
</ol>
<div class="row">

	<div class="col">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Surat KGB</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 250px">
								<b>No Surat</b>
							</td>
							<td>:
								<?php echo $data_cek['no_surat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Perihal</b>
							</td>
							<td>:
								<?php echo $data_cek['perihal']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Tanggal Surat</b>
							</td>
							<td>:
								<?php echo tgl_indo($data_cek['tanggal_surat']); ?>
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
							<td style="width: 200px">
								<b>Tempat, Tanggal Lahir</b>
							</td>
							<td>:
								<?php echo $data_cek['tempat_lahir']; ?>, <?php echo tgl_indo($data_cek['tanggal_lahir']); ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>NIP / KARPEG</b>
							</td>
							<td>:
								<?php echo $data_cek['nip']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Pangkat & Golongan Ruang</b>
							</td>
							<td>:
								<?php echo $data_cek['pangkat']; ?>
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
				<div class="card-footer">
					<a href="?page=data-kgb" class="btn btn-warning">Kembali</a>
					</div>
			</div>
		</div>
	</div>

	

</div>