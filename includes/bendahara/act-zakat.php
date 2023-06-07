<?php 
    include '../koneksi.php';
    if(isset($_POST['simpan'])){

    $tgl_donasi = date("Y-m-d");
    $nama = $_POST['nama_kk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jenis_zakat = $_POST['jenis_zakat'];
    $pilihan_beras = $_POST['pilihan_beras'];
    $jml_tanggungan = $_POST['jml_tanggungan'];
    $total = $_POST['total'];

    $query = "INSERT INTO zakatfitrah (tgl_donasi,nama_kk, alamat,no_hp,jenis_zakat, pilihan_beras, jml_tanggungan, total) values ('$tgl_donasi','$nama','$alamat','$no_hp','$jenis_zakat','$pilihan_beras','$jml_tanggungan','$total')";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil ditambahkan!');
        document.location.href='data-zakat.php';</script>";
    } else {
        echo "<script>alert('Data Gagal ditambahkan!');
        document.location.href='data-zakat.php';</script>";
    }
} else if (isset($_GET['del'])){
        $id = $_GET['id_zakat'];
    
        $query = "DELETE FROM zakatfitrah where id_zakat=$id";
        if (mysqli_query($koneksi, $query) == 'true') {
            echo "<script>alert('Data Berhasil dihapus!');
            document.location.href='data-zakat.php';</script>";
        } else { 
            echo "<script>alert('Data Gagal dihapus!');
            document.location.href='data-zakat.php';</script>";
        }
    } 

else if (isset($_POST['edit-simpan'])){
        $id = $_POST['id_zakat'];
        $tgl_donasi = date("Y-m-d");
        $nama = $_POST['nama_kk'];
        $alamat = $_POST['alamat'];
        $pilihan_beras = $_POST['pilihan_beras'];
        $jml_tanggungan = $_POST['jml_tanggungan'];
        $total = $_POST['total'];
    
    
        $query = "UPDATE zakatfitrah set tgl_donasi='$tgl_donasi', nama_kk='$nama', alamat='$alamat', pilihan_beras='$pilihan_beras', jml_tanggungan='$jml_tanggungan', total='$total' where id_zakat='$id'";
        if (mysqli_query($koneksi, $query) == "true") {
            echo "<script>alert('Data Berhasil diubah!');
            document.location.href='data-zakat.php';</script>";
        } else { 
            echo "<script>alert('Data Gagal diubah!');
            document.location.href='data-zakat.php';</script>";
        }
    }
    
?>