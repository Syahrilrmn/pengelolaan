<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_ppensiun WHERE nip='".$_GET['kode']."'";
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
                <a href="?page=data-pengajuan-pensiun-01" class="btn btn-primary btn-block">
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
                                <td width="600">1. Nama</td>
                                <td>: <?php echo $data_cek['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>2. NIP</td>
                                <td>: <?php echo $data_cek['nip']; ?></td>
                            </tr>
                            <tr>
                                <td>3. Jenis Kelamin</td>
                                <td>: <?php echo $data_cek['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>4. Tempat, Tanggal Lahir</td>
                                <td>:
                                <?php echo $data_cek['tempat_lahir']; ?>, <?php echo tgl_indo($data_cek['tanggal_lahir']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>5. Usia</td>
                                <td>: <?php echo $data_cek['usia']; ?> Tahun</td> 
                            </tr>
                            <tr>
                                <td>6. TMT Kinerja</td>
                                <td>: <?php echo tgl_indo($data_cek['tmt_kinerja']); ?></td>
                            </tr>
                            <tr>
                                <td>7. Gaji Pokok</td>
                                <td>: <?php echo rupiah($data_cek['gapok']); ?></td>
                            </tr>
                            <tr>
                                <td>8. Nomor Rekening</td>
                                <td>: <?php echo $data_cek['no_rek']; ?></td>
                            </tr>
                            <tr>
                                <td>9. Alasan</td>
                                <td>: <?php echo $data_cek['alasan']; ?></td>
                            </tr>
                            <tr>
                                <td>10. Keterangan</td>
                                <td>: <b> <?php echo $data_cek['ket']; ?></b></td>
                            </tr>
                            <tr><td><br></td></tr>
                            <tr>
                              <td>
                                <label>Berkas Persyaratan Pengsiun</label>
                              </td>
                            </tr>
                            <tr>
                                <td>a. Surat Permohonan PNS yang bersangkutan</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Surat Usul SKPD</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload1']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>c. Data Perorangan Calon Penerima Pensiun (DCPC)</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload2']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>d. SK CPNS</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload3']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>e. SK PNS</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload4']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>f. SK Pangkat Terakhir</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload5']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>g. SK Jabatan Terakhir</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload6']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>h. Daftar Susunan keluarga dari Lurah</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload7']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>i. SK PMK (Peninjauan Masa Kerja)</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload8']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>j. Surat Nikah (disahkan KUA)</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload9']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>k. KTP Istri / Suami</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload10']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>l. Akta Kelahiran Anak (disahkan Disdukcapil)</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload11']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>m. Surat Keterangan Kuliah dari Fakultas</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload12']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>n. SKP 1 tahun terakhir</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload13']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>o. Surat Pernyataan tidak pernah dijatuhi hukuman disiplin tingkat sedang/berat</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload14']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>p. Surat Pernyataan tidak sedang menjalani proses Pidana atau pernah dipidana</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload15']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>q. Pasfoto berwarna 3x4</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload16']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>r. eKTP (Kartu Tanda Penduduk)</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload17']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>s. NPWP</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload18']);?>" target="_blank">
                                <i class="fa fa-fw fa-download"></i> Unduh</a>
                                </td>
                            </tr>
                            <tr>
                                <td>t. Buku Tabungan</td><td>: 
                                <a href="<?=('uploads/'.$data_cek['upload19']);?>" target="_blank">
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