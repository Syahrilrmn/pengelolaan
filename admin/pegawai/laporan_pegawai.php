<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Cetak Data Pegawai
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">

            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>New pegawai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * from tb_pegawai");
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
                                <?php echo $data['alamat']; ?>
                            </td>
                            <td>
                                <?php echo $data['new_pegawai']; ?>
                            </td>

                            <td>
                                <a href="?page=laporan-cetak&kode=<?php echo $data['nip']; ?>" title="Cetak" class="btn btn-info btn-sm" target="_blank">cetak
                                    <i class="fa fa-print"></i>
                                </a>
                                <!-- </a>
							<a href="?page=edit-pegawai&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pegawai&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i> -->
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
            <!-- <div class="card-footer">

                <a href="./report/cetak-data-pegawai.php" title="Cetak Data pegawai" class="btn btn-primary">Print</a>
            </div> -->
        </div>
    </div>
    <!-- /.card-body -->