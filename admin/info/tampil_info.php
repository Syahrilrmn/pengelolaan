<div class="card card-info col-12">
		<div class="card-body">
			<h5 class="fa bi bi-megaphone-fill"> PENGUMUMAN</h5>
			<br><br>
			<?php
				$sql = $koneksi->query("select * from tb_info");
				while ($data = $sql->fetch_assoc()) {
			?>
				<div>
				<h6><b><?php echo $data['info'] ;?></b></h6>
				</div>
				<div><span>Dari tanggal <?php echo tgl_indo($data['dari_tgl']) ;?>, 
				sampai <?php echo tgl_indo($data['sampai_tgl']) ;?></span>
				</div>
				<div><p><?php echo $data['ket'];?></p></div>
			<?php
			}?>
		</div>
	</div>
<div class="card-footer">
	<a href="?page=data-info" title="Kembali" class="btn btn-primary">Kembali</a>
</div>