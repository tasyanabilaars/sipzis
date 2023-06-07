<?php

  session_start();

  // memanggil file koneksi.php untuk melakukan koneksi database
  include '../koneksi.php';


  if (isset($_GET['del'])){
    $id = $_GET['id_pengurus'];
  
    $query = "DELETE FROM pengurus where id_pengurus=$id";
    if (mysqli_query($koneksi, $query) == 'true') {
        echo "<script>alert('Data Berhasil dihapus!');
        document.location.href='data-pengurus.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal dihapus!');
        document.location.href='data-pengurus.php';</script>";
    }
  }

  else if (isset($_POST['edit-pengurus'])){
    $id   = $_POST['id_pengurus'];
    $nama   = $_POST['periode'];
    $foto = $_FILES['foto']['name'];
 
    $query = "UPDATE pengurus set periode='$nama', foto='$foto' where id_pengurus='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Data Berhasil diubah!');
        document.location.href='data-pengurus.php';</script>";
    } else { 
        echo "<script>alert('Data Gagal diubah!');
        document.location.href='edit-pengurus.php';</script>";
    }
}
  
  

	// membuat variabel untuk menampung data dari form
  else if (isset($_POST['simpan'])){
  $nama   = $_POST['periode'];
  $foto = $_FILES['foto']['name'];


  //cek dulu jika ada gambar produk jalankan coding ini
  if($foto != "") 
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../berkas/pengurus/'.$foto); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO pengurus (periode, foto) VALUES ('$nama','$foto')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='data-pengurus.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah-pengurus.php';</script>";
            }
} else {
   $query = "INSERT INTO pengurus (periode,foto) VALUES ('$nama','$foto')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='data-pengurus.php';</script>";
                  }
}
 
?>