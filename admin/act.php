<?php

include '../koneksi.php';

if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $level = $_POST['level'];

    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'"));
    if ($cek > 0) {
        echo '<script language="javascript">
              alert ("NIK telah terdaftar di dalam database");
              window.location="index.php?hal=form-input-siswa";
              </script>';
        exit();
    }
    else{
        //query insert dijalankan
    }
}
?>