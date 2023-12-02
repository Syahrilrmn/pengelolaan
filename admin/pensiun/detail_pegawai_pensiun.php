<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pensiun WHERE nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    //FUNGSI TANGGAL INDO
?>
<!-- Main content -->
      <div class="container-fluid">
        <div class="row">
            <div>
              <div class="card-header">
                <a href="?page=data-pegawai-pensiun" class="btn btn-primary btn-block">
                  <i class="bi bi-arrow-left-square"></i><b>  Kembali</b></a>
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" 
                  href="#detailguru" data-toggle="tab">Detail Pegawai Pengsiun</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="detailguru">
                    <!-- Post -->
                    <div class="post">
                      
                      <table>
                        <tbody>
                            <tr>
                                <td width="300">Nama</td>
                                <td>: <?php echo $data_cek['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>nip</td>
                                <td>: <?php echo $data_cek['nip']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo $data_cek['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>:
                                <?php echo $data_cek['tempat_lahir']; ?>, <?php echo tgl_indo($data_cek['tanggal_lahir']);?>
                                </td>
                            </tr>
                            <tr>
                                <td>Usia</td>
                                <td>: <?php echo $data_cek['usia']; ?> Tahun</td> 
                            </tr>
                            <tr>
                                <td>TMT Kinerja</td>
                                <td>: <?php echo tgl_indo($data_cek['tmt_kerja']); ?></td>
                            </tr>
                            <tr>
                                <td>Gaji Pokok</td>
                                <td>: <?php echo rupiah($data_cek['gapok']); ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>: <?php echo $data_cek['no_rek']; ?></td>
                            </tr>
                            <tr>
                                <td>Alasan</td>
                                <td>: <?php echo tgl_indo($data_cek['tgl_pensiun']); ?></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.post -->              
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->