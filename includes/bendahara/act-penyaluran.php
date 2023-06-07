<?php 
include '../koneksi.php';

if(isset($_POST['simpan'])){
    $tgl_penerima = date("Y-m-d");
    $penerima = $_POST['penerima'];
    $alamat = $_POST['alamat'];
    $jml_uang = $_POST['jml_uang'];
    $jml_beras = $_POST['jml_beras'];
    
    $query = "INSERT INTO penerimaan (tgl_penerima, penerima, alamat, jml_uang, jml_beras) values ('$tgl_penerima','$penerima','$alamat','$jml_uang', '$jml_beras')";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil ditambahkan!');
        document.location.href='penyaluran-zis.php';</script>";
    } else {
        echo "<script>alert('Data Gagal ditambahkan!');
        document.location.href='penyaluran-zis.php';</script>";
    }
} else if (isset($_GET['del'])){
    $id = $_GET['id_penyaluran'];

    $query = "DELETE FROM penerimaan where id_penyaluran=$id";
    if (mysqli_query($koneksi, $query) == 'true') {
        echo "<script>alert('Data Berhasil dihapus!');
        document.location.href='penyaluran-zis.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal dihapus!');
        document.location.href='penyaluran-zis.php';</script>";
    }
} else if (isset($_POST['edit-simpan'])){
    $id = $_POST['id_penyaluran'];
    $tgl_penerima = date("Y-m-d");
    $penerima = $_POST['penerima'];
    $alamat= $_POST['alamat'];
    $jml_uang=$_POST['jml_uang'];
    $jml_beras=$_POST['jml_beras'];

    $query = "UPDATE penerimaan set tgl_penerima='$tgl_penerima', penerima='$penerima', alamat='$alamat', jml_uang='$jml_uang', jml_beras='$jml_beras' where id_penyaluran='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil diubah!');
        document.location.href='penyaluran-zis.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal diubah!');
        document.location.href='penyaluran-zis.php';</script>";
    }
}

?>


