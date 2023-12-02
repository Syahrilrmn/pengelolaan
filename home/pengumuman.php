<?php

        $sql_cek = "SELECT * FROM tb_profil";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

		
?>
	<h4>Selamat datang <b><?php echo $data_nama ?></b>, Anda login sebagai <b><?php echo $data_level ?></b></h4> <br>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa bi bi-megaphone-fill"></i> Pengumuman</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
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
	</form>
</div>
	

	