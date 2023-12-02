<?php

        $sql_cek = "SELECT * from tb_naik_gaji WHERE nip='$data_user'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

        if ($data_cek) {
          echo "<script>
          Swal.fire({title: 'Data Naik Gaji Ada',text: '',icon: 'success',confirmButtonText: 'Tampilkan'
          }).then((result) => {if (result.value){
              window.location = 'index.php?page=tampil-naikgaji';
              }
          })</script>";
        } else {
          echo "<script>
          Swal.fire({title: 'Data Naik Gaji Tidak Ada',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value){
              window.location = 'index.php';
              }
          })</script>";
        }
?>