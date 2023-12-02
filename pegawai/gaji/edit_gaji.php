<?php

        $sql_cek = "SELECT * FROM tb_data_gaji WHERE nip='$data_user'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tmt</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tmt" name="tmt" value="<?php echo $data_cek['tmt']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Ruang</label>
				<div class="col-sm-5">
					<select name="golongan" id="golongan" class="form-control">
						<option>- Pilih -</option>
						<?php
               	if ($data_cek['golongan'] == "I/a") echo "<option value='I/a' selected>I/a</option>";
                else echo "<option value='I/a'>I/a</option>";

                if ($data_cek['golongan'] == "I/b") echo "<option value='I/b' selected>I/b</option>";
                else echo "<option value='I/b'>I/b</option>";

				if ($data_cek['golongan'] == "I/c") echo "<option value='I/c' selected>I/c</option>";
                else echo "<option value='I/c'>I/b</option>";

				if ($data_cek['golongan'] == "I/d") echo "<option value='I/d' selected>I/d</option>";
                else echo "<option value='I/d'>I/d</option>";

				if ($data_cek['golongan'] == "II/a") echo "<option value='II/a' selected>II/a</option>";
                else echo "<option value='II/a'>II/a</option>";
				
				if ($data_cek['golongan'] == "II/b") echo "<option value='II/b' selected>II/b</option>";
                else echo "<option value='II/b'>II/b</option>";

				if ($data_cek['golongan'] == "II/c") echo "<option value='II/c' selected>II/c</option>";
                else echo "<option value='II/c'>II/c</option>";

				if ($data_cek['golongan'] == "II/d") echo "<option value='II/d' selected>II/d</option>";
                else echo "<option value='II/d'>II/d</option>";

				if ($data_cek['golongan'] == "III/a") echo "<option value='III/a' selected>III/a</option>";
                else echo "<option value='III/a'>III/a</option>";

				if ($data_cek['golongan'] == "III/b") echo "<option value='III/b' selected>III/b</option>";
                else echo "<option value='III/b'>III/b</option>";

				if ($data_cek['golongan'] == "III/c") echo "<option value='III/c' selected>III/c</option>";
                else echo "<option value='III/c'>III/c</option>";

				if ($data_cek['golongan'] == "III/d") echo "<option value='III/d' selected>III/d</option>";
                else echo "<option value='III/d'>III/d</option>";

				if ($data_cek['golongan'] == "IV/a") echo "<option value='IV/a' selected>IV/a</option>";
                else echo "<option value='IV/a'>IV/a</option>";

                if ($data_cek['golongan'] == "IV/b") echo "<option value='IV/b' selected>IV/b</option>";
                else echo "<option value='IV/b'>IV/b</option>";

				if ($data_cek['golongan'] == "IV/c") echo "<option value='IV/c' selected>IV/c</option>";
                else echo "<option value='IV/c'>IV/b</option>";

				if ($data_cek['golongan'] == "IV/d") echo "<option value='IV/d' selected>IV/d</option>";
                else echo "<option value='IV/d'>IV/d</option>";

				if ($data_cek['golongan'] == "IV/e") echo "<option value='IV/e' selected>IV/e</option>";
                else echo "<option value='IV/e'>IV/e</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja Golongan</label>
				<div class="col-sm-5">
				<select name="masakerja" id="masakerja" class="form-control">
						<option>- Pilih -</option>
						<?php
						if ($data_cek['masakerja'] == "2") echo "<option value='2' selected>2</option>";
						else echo "<option value='2'>2</option>";
		
						if ($data_cek['masakerja'] == "4") echo "<option value='4' selected>4</option>";
						else echo "<option value='4'>4</option>";

						if ($data_cek['masakerja'] == "6") echo "<option value='6' selected>6</option>";
						else echo "<option value='6'>6</option>";

						if ($data_cek['masakerja'] == "8") echo "<option value='8' selected>8</option>";
						else echo "<option value='8'>8</option>";
					?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Lama</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gajilama" name="gajilama" value="<?php echo $data_cek['gajilama']; ?>"
					readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gaji Baru</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="gajibaru" name="gajibaru" value="<?php echo $data_cek['gajibaru']; ?>"
					readonly/>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=tampil-gajip" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	
if (isset ($_POST['Ubah'])){


        $sql_ubah = "UPDATE tb_data_gaji SET
			golongan='".$_POST['golongan']."',
			masakerja='".$_POST['masakerja']."',
			gajilama='".$_POST['gajilama']."',
			gajibaru='".$_POST['gajibaru']."'
            WHERE nip='$data_user'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=tampil-gajip';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=tampil-gajip';
            }
        })</script>";
    }
}

