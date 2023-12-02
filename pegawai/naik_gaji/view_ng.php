<?php

        $sql_cek = "SELECT * from tb_naik_gaji WHERE nip='$data_user'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);	
?>
<div class="row">

	<div class="col">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data NaikGaji</h3>

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
								<?php echo $data_cek['jeniskelamin']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Tmt</b>
							</td>
							<td>:
								<?php echo $data_cek['tmt']; ?>
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
						<tr>
							<td style="width: 150px">
								<b>File SK</b>
							</td>
							<td>:
                                <a href="<?=('uploads/'.$data_cek['upload']);?>" target="_blank" title="Lihat File"> <?php echo $data_cek['upload']; ?>
                                </a>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	

</div>