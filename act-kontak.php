<?php
    // memanggil file koneksi.php untuk melakukan koneksi database
    include 'koneksi.php';

    if(isset($_POST['kirim'])){
    //membuat variabel untuk menampung data dari form
    $nama   = $_POST['nama_pengirim'];
    $topik = $_POST['topik'];
    $deskripsi_kritik = $_POST['deskripsi_kritik'];

    $query = "INSERT INTO kritik_saran (nama_pengirim, topik, deskripsi_kritik) VALUES ('$nama','$topik','$deskripsi_kritik')";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Kritik $ Saran Anda BERHASIL dikirim!');
        document.location.href='home-kontak.php';</script>";
    } else {
        echo "<script>alert('Kritik & Saran Anda GAGAL dikirim!');
        document.location.href='home-kontak.php';</script>";
    }
}
?>