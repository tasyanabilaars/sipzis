<?php 
session_start();

include '../koneksi.php';

//proses
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $level = $_POST['level'];
    
    //script validasi data
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' OR password='$password' OR alamat='$alamat' OR no_hp='$no_hp'"));
    if ($cek > 0){
        echo "<script>alert('Data yang Anda masukan sudah ada!');
        document.location.href='tambah-admin.php';</script>";
    } else { 
        mysqli_query($koneksi,"INSERT INTO user (username, password, alamat, no_hp, level) values ('$username','$password','$alamat','$no_hp','$level')");
        echo "<script>alert('Data Berhasil ditambahkan!');
        document.location.href='data-admin.php';</script>";
    }   
} else if (isset($_GET['del'])){
    $id = $_GET['id_user'];

    $query = "DELETE FROM user where id_user=$id";
    if (mysqli_query($koneksi, $query) == 'true') {
        echo "<script>alert('Data Berhasil dihapus!');
        document.location.href='data-admin.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal dihapus!');
        document.location.href='data-admin.php';</script>";
    }
} else if (isset($_POST['edit-simpan'])){
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE user set username='$username', password='$password', alamat='$alamat', no_hp='$no_hp' where id_user='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil diubah!');
        document.location.href='data-admin.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal diubah!');
        document.location.href='data-admin.php';</script>";
    }
}


?>
