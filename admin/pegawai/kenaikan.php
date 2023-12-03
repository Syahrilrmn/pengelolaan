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
                        <!-- <th width="100px">Aksi</th> -->
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
                                <?php echo $data['golongan']; ?>
                            </td>
                         
                            <td>
								<a href="?page=edit-pangkat-01&kode=<?php echo $data['nip']; ?>">
                                <?php echo $data['pangkat']; ?>
                                </a>
							</td>

                            <!-- <td>
								<a href="?page=view-pegawai&kode=<?php echo $data['nip']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								</a>
								<a href="?page=edit-pegawai&kode=<?php echo $data['nip']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pegawai&kode=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
							</td> -->
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