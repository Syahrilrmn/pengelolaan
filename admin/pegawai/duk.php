<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Data DUK Pegawai</li>
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
                        <th width="150px">Pangkat</th>
                        <th width="150px">Golongan</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;

                    // Tentukan urutan pangkat
                    $urutanPangkat = ['Pengatur', 'Pembina', 'Penata', 'Juru'];

                    // Tambahkan ORDER BY pada query SQL untuk mengurutkan berdasarkan urutan pangkat
                    if (isset($_POST['new_pegawai'])) {
                        $new_pegawai = $_POST['new_pegawai'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE new_pegawai='$new_pegawai' ORDER BY FIELD(pangkat, '" . implode("','", $urutanPangkat) . "')");
                    } else {
                        $sql = $koneksi->query("SELECT * FROM tb_pegawai ORDER BY FIELD(pangkat, '" . implode("','", $urutanPangkat) . "')");
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
                                <?php echo $data['pangkat']; ?>
                            </td>
                            <td>
                                <?php echo $data['golongan']; ?>
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