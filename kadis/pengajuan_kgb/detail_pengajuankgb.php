<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pkgb WHERE nip='".$_GET['kode']."'";
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
                <a href="?page=data-pengajuankgb-02" class="btn btn-primary btn-block">
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
                  href="#detailguru" data-toggle="tab">Detail Permohonan Pengsiun</a></li>
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
                                <td>NIP</td>
                                <td>: <?php echo $data_cek['nip']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo $data_cek['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>TMT</td>
                                <td>:
                                <?php echo tgl_indo($data_cek['tmt']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Pangkat/Golongan</td>
                                <td>: <?php echo $data_cek['pangkat']; ?>/<?php echo $data_cek['golongan']; ?></td> 
                            </tr>
                            <tr>
                                <td>MKG</td>
                                <td>: <?php echo $data_cek['masakerja']; ?> Tahun</td>
                            </tr>
                            <tr>
                                <td>Gaji Sebelumnya</td>
                                <td>: <?php echo rupiah($data_cek['gaji_before']); ?></td>
                            </tr>
                            <tr>
                                <td>Surat Pengantar dari Kepsek</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SK Pangkat terakhir <br></td><td>: 
                                <a href="<?=('uploads/'.$data_cek['sk_pangkat']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SK Berkala terakhir</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['sk_berkala']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
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