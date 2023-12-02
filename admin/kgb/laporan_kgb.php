<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?page=data-kgb">SK KGB</a></li>
    <li class="breadcrumb-item active">Laporan SK KGB</li>
</ol>
<div class="card card-info">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
        <div>
            <h6 style="margin-left: auto;"><b>Laporan SK KGB</b><p>(Semua Laporan SK KGB)</p>
            </h6>
            <a href="admin/kgb/cetak_laporankgb.php" class="btn btn-warning" target="_blank">
					<i class="fa bi bi-printer-fill"></i> Cetak Laporan SK KGB</button>
            </a>
        </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>No</th>
						<th>Nomor Surat</th>
						<th>Tanggal Surat</th>
						<th>Nip</th>
						<th>Nama</th>
						<th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * from tb_kgb");
                    while ($data = $sql->fetch_assoc()) {
                    ?>


                        <tr>
                        <td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_surat']; ?>
							</td>
							<td>
								<?php echo tgl_indo ($data['tanggal_surat']); ?>
							</td>
							<td>
								<?php echo $data['nip']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>

                            <td>
                                <a href="admin/kgb/cetak_kgb.php?kode=<?php echo $data['id_kgb']; ?>" title="Cetak" class="btn btn-info btn-sm" target="_blank">cetak
                                    <i class="fa fa-print"></i>
                                </a>
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