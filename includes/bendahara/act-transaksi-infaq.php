<?php
include '../koneksi.php';

if (isset($_POST['submit'])){
    $id = $_POST['id_infaq'];
    $status = $_POST['status'];
    
    $query = "UPDATE infaq SET status='$status' where id_infaq='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Donasi Infaq BERHASIL dikonfirmasi!');
        document.location.href='data-infaq.php';</script>";
    } else { 
        echo "<script>alert('Donasi Infaq GAGAL dikonfirmasi!');
        document.location.href='data-infaq.php';</script>";
    }
}
?>