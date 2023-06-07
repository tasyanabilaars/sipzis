<?php
session_start();
if(!isset($_SESSION['user'])) {
  header("Location: admin/login.php");
}
require 'act-zakat.php';
$id = $_GET['id_zakat'];

if (hapus($id) > 0){
    echo "<script>alert('Data Berhasil dihapus!');
    document.location.href='data-zakat.php';</script>";

} else {
    echo "<script>alert('Data berhasil dihapus!');document.location='data-zakat.php';</script>";
}

?>