<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Riwayat Pendidikan Pegawai</li>
</ol>
<div class="card card-info">

    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-rpp" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <br>
            <span style="margin-left:500px; margin-top:4px; position: absolute;"><?php echo $hariIni->format('d-F-Y') . '<br>'; ?></span>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr style="background-color: #343A40; color :aliceblue;">
                        <th width="10px">No</th>
                        <th>Nama </th>
                        <th>nip</th>
                        <th>Tingkat</th>
                        <th>Sekolah</th>
                        <th>Jurusan</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Keluar</th>
                        <th>Gelar</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $sql = mysqli_query($koneksi, "SELECT r_pendidikan.*, tb_pegawai.nama, tb_pegawai.nip FROM r_pendidikan JOIN tb_pegawai ON r_pendidikan.id_pegawai = tb_pegawai.nip WHERE r_pendidikan.id='$id'");
                    } else {
                        $sql = $koneksi->query("SELECT r_pendidikan.*, tb_pegawai.nama, tb_pegawai.nip FROM r_pendidikan JOIN tb_pegawai ON r_pendidikan.id_pegawai = tb_pegawai.nip");
                    }
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <?php echo $data['nip']; ?>
                            </td>
                            <td>
                                <?php echo $data['tingkat']; ?>
                            </td>
                            <td>
                                <?php echo $data['sekolah']; ?>
                            </td>
                            <td>
                                <?php echo $data['jurusan']; ?>
                            </td>
                            <td>
                                <?php echo $data['masuk']; ?>
                            </td>
                            <td>
                                <?php echo $data['keluar']; ?>
                            </td>
                            <td>
                                <?php echo $data['gelar']; ?>
                            </td>

                            <td>
                                <a href="?page=edit-rpp&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-rpp&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
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

                <!-- /. <a href="./report/cetak-data-gaji.php" title="Cetak Data Gaji" class="btn btn-primary">Print</a> -->
            </div>
        </div>
    </div>


    <!-- /.card-body -->