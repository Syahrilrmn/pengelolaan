<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data-rp">Riwayat Pendidikan Pegawai</a></li>
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
                <label class="col-sm-2 col-form-label">Perusahaab</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="Perusahaan" name="Perusahaan" placeholder="Nama Perusahaan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pangkat</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="Pangkat" name="Pangkat" placeholder="Pangkat" required>
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
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-rp" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<?php
if (isset($_POST['Simpan'])) {
    $sql_simpan = "INSERT INTO r_kepegawaian (id_pegawai, perusahaan, jabatan, pangkat, masuk, keluar) VALUES (
      '" . $_POST['id_pegawai'] . "',
      '" . $_POST['perusahaan'] . "',
      '" . $_POST['jabatan'] . "',
      '" . $_POST['pangkat'] . "',
      '" . $_POST['masuk'] . "',
      '" . $_POST['keluar'] . "')";
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
          window.location = 'index.php?page=data-rp';
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
          window.location = 'index.php?page=add-rp';
        }
      })</script>";
    }
}
?>