<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_riwayatkp WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	<li class="breadcrumb-item"><a href="?page=data-riwayatkp">Data Riwayat Kenaikan Pangkat</a></li>
    <li class="breadcrumb-item active">Detail Riwayat Kenaikan Pangka</li>
</ol>
<div class="row">

	<div class="col">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Riwayat Kenaikan Pangkat</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 250px">
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
								<b>Tmt</b>
							</td>
							<td>:
								<?php echo tgl_indo($data_cek['tgl']); ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jabatan Sebelum </b>
							</td>
							<td>:
								<?php echo $data_cek['jabatan_sebelum']; ?>
							</td>
						</tr>
                        <tr>
							<td style="width: 150px">
								<b>Jabatan Sekarang</b>
							</td>
							<td>:
								<?php echo $data_cek['jabatan_setelah']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="javascript:history.go(-1)" class="btn btn-warning">Kembali</a>

					</div>
			</div>
		</div>
	</div>

	

</div>