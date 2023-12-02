<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



</head>

<body>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Status Keadaan Pegawai</li>
    </ol>
    <div class="card card-info">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">

                <span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: #343A40; color :aliceblue;">
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Karpeg</th>
                            <th>Pangkat/Golongan</th>
                            <th>Status Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        if (isset($_POST['nip'])) {
                            $nip = $_POST['nip'];
                            $sql = mysqli_query($koneksi, "select * from tb_pegawai where nip='$nip'");
                        } else {
                            $sql = $koneksi->query("SELECT * from tb_pegawai");
                        }
                        while ($data = $sql->fetch_assoc()) {


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
                                    <?php echo $data['pangkat']; ?>/<?php echo $data['golongan']; ?>
                                </td>
                                <td>
                                    <a href="?page=edit-status-01&kode=<?php echo $data['nip']; ?>">

                                        <span class="badge <?php echo ($data['ket'] == 'AKTIF') ? 'badge-success' : 'badge-danger'; ?>">
                                            <?php echo $data['ket']; ?>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>

</body>

</html>