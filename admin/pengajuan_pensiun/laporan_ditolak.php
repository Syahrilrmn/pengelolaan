<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?page=data-pengajuan-pensiun-01">Pengajuan Pensiun</a></li>
    <li class="breadcrumb-item active">Laporan Pengajuan Pensiun Ditolak</li>
</ol>
<div class="card card-info">
    <?php
    // Load file koneksi.php
    $tgl_awal = @$_POST['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    $tgl_akhir = @$_POST['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data transaksi
        $query = "SELECT * FROM tb_ppensiun";
        $url_cetak = "admin/pengajuan_pensiun/cetak_ditolak.php";
        $label = "( Semua Pengajuan Pensiun Ditolak)";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "SELECT * FROM tb_ppensiun";
        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
        $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
    }
    ?>
    <div style="padding: 15px;">
        <form method="POST">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                   
                </div>
            </div>

        </form>

        <div>
            <h6 style="margin-left: auto;"><b>Laporan Pengajuan Pensiun Ditolak</b>
                <?php echo $label ?>
            </h6>
            <a href="admin/pengajuan_pensiun/cetak_ditolak.php" class="btn btn-warning" target="_blank">
					<i class="fa bi bi-printer-fill"></i> Cetak Laporan Pengajuan Pensiun Ditolak</button>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="table-responsive" style="margin-top: auto;">
            <table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: #343A40; color :aliceblue;">
						<th width="10px">No</th>	
						<th>Nama</th>
						<th>NIP</th>
                        <th>Usia</th>
						<th>Jenis kelamin</th>
						<th>TMT</th>
						<th>Gaji Pokok</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>

					<?php
                    $no = 1;
					$sql = $koneksi->query("select * from tb_ppensiun WHERE ket='DITOLAK'");
					while ($data= $sql->fetch_assoc()) {
                        $no;
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
								<?php echo $data['usia']; ?> Tahun
							</td>
                            <td>
								<?php echo $data['jk']; ?>
							</td>
							<td>
								<?php echo tgl_indo($data['tmt_kinerja']); ?>
							</td>
							<td>
								<?php echo rupiah($data['gapok']); ?>
							</td>
							<td>
								<?php echo $data['ket']; ?>
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
        <!-- Include File JS Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- Include library Bootstrap Datepicker -->
        <script src="../assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- Include File JS Custom (untuk fungsi Datepicker) -->
        <script src="../assets/js/custom.js"></script>
        <script>
            $(document).ready(function() {
                setDateRangePicker(".tgl_awal", ".tgl_akhir")
            })
        </script>
        </body>

        </html>