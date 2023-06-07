<?php 
include '../koneksi.php';

if(isset($_POST['simpan'])){
    $tgl_penerima = $_POST['tgl_penerima'];
    $penerima = $_POST['penerima'];
    $alamat = $_POST['alamat'];
    $jml_uang = $_POST['jumlah_uang'];
    $jml_beras = $_POST['jumlah_beras'];
    $bulan = date('m');
    
    //script validasi data
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM penyaluran WHERE tgl_penerima='$tgl_penerima' AND month(tgl_penerima)='$bulan'"));
    if ($cek > 0){
        echo "<script>alert('Data ini sudah dimasukkan HARI INI!');
        document.location.href='tambah-penyaluran.php';</script>";
    } else { 
        mysqli_query($koneksi,"INSERT INTO penyaluran (tgl_penerima, penerima, alamat, jumlah_uang, jumlah_beras) VALUES ('$tgl_penerima','$penerima','$alamat','$jml_uang', '$jml_beras')");
        echo "<script>alert('Data Berhasil ditambahkan!');
        document.location.href='penyaluran.php';</script>";
    }

} else if (isset($_GET['del'])){
    $id = $_GET['id_penyaluran'];

    $query = "DELETE FROM penyaluran WHERE id_penyaluran=$id";
    if (mysqli_query($koneksi, $query) == 'true') {
        echo "<script>alert('Data Berhasil dihapus!');
        document.location.href='penyaluran.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal dihapus!');
        document.location.href='penyaluran.php';</script>";
    }
} else if (isset($_POST['edit-simpan'])){
    $id = $_POST['id_penyaluran'];
    $tgl_penerima = $_POST['tgl_penerima'];
    $penerima = $_POST['penerima'];
    $alamat= $_POST['alamat'];
    $jml_uang=$_POST['jumlah_uang'];
    $jml_beras=$_POST['jumlah_beras'];

    $query = "UPDATE penyaluran set tgl_penerima='$tgl_penerima', penerima='$penerima', alamat='$alamat', jumlah_uang='$jml_uang', jumlah_beras='$jml_beras' WHERE id_penyaluran='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil diubah!');
        document.location.href='penyaluran.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal diubah!');
        document.location.href='penyaluran.php';</script>";
    }
}

?>


