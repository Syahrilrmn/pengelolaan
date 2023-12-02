<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data-rpp">Riwayat Pendidikan Pegawai</a></li>
    <li class="breadcrumb-item active">Tambah Data</li>
</ol>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                <div class="col-sm-5">
                    <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                        <?php
                        $npegawai = mysqli_query($koneksi, "SELECT nip, nama FROM tb_pegawai");
                        while ($row = mysqli_fetch_array($npegawai)) {
                            echo '<option value="' . $row['nip'] . '">' . $row['nama'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tingkat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Tingkat Sekolah" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Nama Sekolah" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama jurusan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="masuk" name="masuk" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="keluar" name="keluar" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gelar</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="gelar" name="gelar" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-rpp" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<?php
if (isset($_POST['Simpan'])) {
    $sql_simpan = "INSERT INTO r_pendidikan (id_pegawai, tingkat, sekolah, jurusan, masuk, keluar, gelar) VALUES (
      '" . $_POST['id_pegawai'] . "',
      '" . $_POST['tingkat'] . "',
      '" . $_POST['sekolah'] . "',
      '" . $_POST['jurusan'] . "',
      '" . $_POST['masuk'] . "',
      '" . $_POST['keluar'] . "',
      '" . $_POST['gelar'] . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({
        title: 'Tambah Data Berhasil',
        text: '',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          window.location = 'index.php?page=data-rpp';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({
        title: 'Tambah Data Gagal',
        text: '',
        icon: 'error',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          window.location = 'index.php?page=add-rpp';
        }
      })</script>";
    }
}
?>