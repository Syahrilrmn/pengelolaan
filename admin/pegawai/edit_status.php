<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pegawai WHERE nip='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                        <option value="AKTIF">AKTIF</option>
                        <option value="NON AKTIF">NON AKTIF</option>
                    </select>
                </div>
            </div>
            <div class="form-group row" id="keteranganInput" style="display: none;">
                <label class="col-sm-3 col-form-label">Masukan Keterangan NON AKTIF</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Masukkan keterangan .....">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-status" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#ket').change(function () {
            var selectedOption = $(this).val();
            if (selectedOption === 'NON AKTIF') {
                $('#keteranganInput').show();
            } else {
                $('#keteranganInput').hide();
            }
        });
    });
</script>

</body>
</html>



<?php

if (isset($_POST['Ubah'])) {

    $sql_ubah = "UPDATE tb_pegawai SET
            ket='" . $_POST['ket'] . "'
            WHERE nip='" . $_GET['kode'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);


    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-status';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-status';
            }
        })</script>";
    }
}

