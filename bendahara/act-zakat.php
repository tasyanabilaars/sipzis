<?php 
    include '../koneksi.php';
    if(isset($_POST['simpan'])){

        $nama   = $_POST['nama_donatur'];
        $alamat   = $_POST['alamat'];
        $jenis_donasi   = $_POST['jenis_donasi'];
        $nilai_zakat   = $_POST['nilai_zakat'];
        $jml_tanggungan = $_POST['jumlah_tanggungan'];
        $total = $_POST['total'];
                
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
        $query_donasi = "INSERT INTO donasi (nama_donatur, alamat, jenis_donasi, total) VALUES ('$nama','$alamat','$jenis_donasi','$total')";
        
        $result_donasi = mysqli_query($koneksi, $query_donasi);

        //dapetin id dari proses insert diatas
        $id_donasi = mysqli_insert_id($koneksi);

        $query_zakat = "INSERT INTO zakatfitrah (nilai_zakat, jumlah_tanggungan, id_donasi) VALUES ('$nilai_zakat','$jml_tanggungan','$id_donasi')";
        
        $result_zakat = mysqli_query($koneksi, $query_zakat);  
        if(!$result_zakat){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
          } else {
          
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('Donasi BERHASIL dilakukan.');window.location='data-zakat.php';</script>";
          }
} else if (isset($_GET['del'])){
        $id = $_GET['id_zakat'];
    
        $query = "DELETE FROM zakatfitrah WHERE id_zakat=$id";
        if (mysqli_query($koneksi, $query) == 'true') {
            echo "<script>alert('Data BERHASIL dihapus!');
            document.location.href='data-zakat.php';</script>";
        } else { 
            echo "<script>alert('Data GAGAL dihapus!');
            document.location.href='data-zakat.php';</script>";
        }
    } 

else if (isset($_POST['edit-simpan'])){
    $id_donasi = $_POST['id_zakat'];
    $nama   = $_POST['nama_donatur'];
    $alamat   = $_POST['alamat'];
    $jenis_donasi   = $_POST['jenis_donasi'];
    $nilai_zakat   = $_POST['nilai_zakat'];
    $jml_tanggungan = $_POST['jumlah_tanggungan'];
    $total = $_POST['total'];

    $query_donasi = "UPDATE donasi SET nama_donatur='$nama', alamat='$alamat', jenis_donasi='$jenis_donasi', total='$total' WHERE id_donasi='$id_donasi'";        
    $result_donasi = mysqli_query($koneksi, $query_donasi);

    //dapetin id dari proses insert diatas
    $id_donasi = mysqli_update_id($koneksi);

    $query_zakat = "UPDATE zakatfitrah SET nilai_zakat='$nilai_zakat', jumlah_tanggungan='$jml_tanggungan' WHERE id_donasi='$id_donasi'";
    
    $result_zakat = mysqli_query($koneksi, $query_zakat);  
    if(!$result_zakat){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
      } else {
      
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data BERHASIL diubah.');window.location='data-zakat.php';</script>";
          }    }
?>