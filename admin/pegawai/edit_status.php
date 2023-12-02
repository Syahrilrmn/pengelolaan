<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pegawai WHERE nip='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Status
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ubah Keterangan</label>
                <div class="col-sm-6">
                    <select name="ket" id="ket" class="form-control">
                    <option disabled selected>---PILIH UBAH STATUS--</option>
                        <option>AKTIF</option>
                        <option>NON AKTIF</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ubah Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="masukan keterangan .....">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pengajuankgb-01" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>


<?php

if (isset($_POST['Ubah'])) {

    $sql_ubah = "UPDATE tb_pkgb SET
            ket='" . $_POST['ket'] . "'
            WHERE nip='" . $_GET['kode'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);


    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengajuankgb-01';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengajuankgb-01';
            }
        })</script>";
    }
}
