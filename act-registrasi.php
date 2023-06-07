<?php 
include 'koneksi.php';

if(isset($_POST['daftar'])){
    $nama = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    
    $query = "INSERT INTO user (username, password, no_hp, alamat) values ('$nama','$password','$no_hp','$alamat')";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Pendaftaran Akun BERHASIL');
        document.location.href='donasi-infaq.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran Akun Gagal dilakukan!');
        document.location.href='donasi-infaq.php';</script>";
    }
} 
?>



