<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Laporan Data Daftar Gaji
        </h3>
    </div>

    <?php
    // Load file koneksi.php
    $tgl_awal = @$_POST['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    $tgl_akhir = @$_POST['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
    if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
        // Buat query untuk menampilkan semua data transaksi
        $query = "SELECT * FROM tb_daftargaji";
        $url_cetak = "admin/daftar_gaji/cetak_daftargaji.php";
        $label = "( Semua Data Daftar Gaji )";
    } else { // Jika terisi
        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
        $query = "SELECT * FROM tb_daftargaji WHERE (new_daftargaji BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "')";
        $url_cetak = "admin/daftar_gaji/cetak_daftargaji.php?tgl_awal=" . $tgl_awal . "&tgl_akhir=" . $tgl_akhir . "&filter=true";
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
            <h6 style="margin-left: auto;"><b>Laporan Daftar Gaji</b>
                <?php echo $label ?>
            </h6>
            <a href="<?php echo $url_cetak ?>" target="_blank">
                <button class="btn btn-success">Cetak PDF</button>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="table-responsive" style="margin-top: auto;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: #343A40; color :aliceblue;">
                            
                        <th width="30px">No</th>
						<th width="30px">Kode</th>
						<th width="80px">MKG</th>
						<th>Pangkat</th>
						<th>Golongan</th>
						<th>Gaji Sebelumnya</th>
						<th>Gaji Sekarang</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                          // Ubah format tanggal jadi dd-mm-yyyy
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $data['id_daftargaji'] . "</td>";
                                echo "<td>" . $data['mkg'] . " Tahun</td>";
                                echo "<td>" . $data['pangkat'] . "</td>";
                                echo "<td>" . $data['golongan'] . "</td>";
                                echo "<td>" . rupiah($data['gaji_before']) . "</td>";
                                echo "<td>" . rupiah($data['gaji_now']) . "</td>";
                                echo "</tr>";
                            }
                        } else { // Jika data tidak ada
                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
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