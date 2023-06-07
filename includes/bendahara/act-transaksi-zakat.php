<?php
include '../koneksi.php';

if (isset($_POST['submit'])){
    $id = $_POST['id_zakat'];
    $status = $_POST['status'];
    
    $query = "UPDATE zakatfitrah SET status='$status' where id_zakat='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil diubah!');
        document.location.href='data-zakatfitrah.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal diubah!');
        document.location.href='data-zakatfitrah.php';</script>";
    }
}
?>