<?php
if (isset($_SESSION["ses_username"]) == "") {
    header("location: login.php");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
}
$koneksi = new mysqli("localhost", "root", "", "pengelolaan");
$data_user = $_SESSION['ses_username']; // Ambil informasi pengguna yang login dari sesi

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Data kenaikan Pegawai</li>
</ol>

<div class="card card-info">

    <div class="card-body">
        <div class="table-responsive">

            <br>
            <span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr style="background-color: #343A40; color :aliceblue;">
                        <th width="30px">No</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Karpeg</th>
                        <th>Golongan</th>
                        <th width="150px">Pangkat</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // ...
                    $no=1;

                    if (isset($_POST['nip'])) {
                        $nip = $_POST['nip'];
                        $sql = $koneksi->query("SELECT * FROM tb_pegawai WHERE nip = '$nip' AND nip = '$data_user'");
                    } else {
                        $sql = $koneksi->query("SELECT * FROM tb_pegawai WHERE nip = '$data_user'");
                    }

                    // Tambahkan penanganan kesalahan
                    if (!$sql) {
                        die("Error in SQL query: " . $koneksi->error);
                    }

                    while ($data = $sql->fetch_assoc()) {
                        // ...



                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nip']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <?php echo $data['karpeg']; ?>
                            </td>
                            <td>
                                <?php echo $data['golongan']; ?>
                            </td>

                            <td>
                                <a href="?page=edit-pangkat-01&kode=<?php echo $data['nip']; ?>">
                                    <?php echo $data['pangkat']; ?>
                                </a>
                            </td>

                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
            <div class="card-footer">

                <!-- /.<a href="./report/cetak-data-pegawai.php" title="Cetak Data pegawai" class="btn btn-primary">Print</a> -->
            </div>
        </div>
    </div>


    <!-- /.card-body -->