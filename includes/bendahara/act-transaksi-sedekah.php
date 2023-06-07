<?php
include '../koneksi.php';

if (isset($_POST['submit'])){
    $id = $_POST['id_sedekah'];
    $status = $_POST['status'];
    
    $query = "UPDATE sedekah SET status='$status' where id_sedekah='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil diubah!');
        document.location.href='data-sedekah.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal diubah!');
        document.location.href='data-sedekah.php';</script>";
    }
}
?>