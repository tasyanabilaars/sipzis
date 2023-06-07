<?php

session_start();
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

if (isset($_GET['del'])){
  $id = $_GET['id_dokumentasi'];

  $query = "DELETE FROM dokumentasi where id_dokumentasi=$id";
  if (mysqli_query($koneksi, $query) == 'true') {
      echo "<script>alert('Data Berhasil dihapus!');
      document.location.href='data-dokumentasi.php';</script>";
  } else { 
      echo "<script>alert('Data Gagal dihapus!');
      document.location.href='data-dokumentasi.php';</script>";
  }
} else if (isset($_POST['edit-simpan'])){
  	// membuat variabel untuk menampung data dari form
    $id = $_POST['id_dokumentasi'];
    $tgl_kegiatan = $_POST['tgl_kegiatan'];
    $nama_kegiatan   = $_POST['nama_kegiatan'];
    $deskripsi= $_POST['deskripsi_kegiatan'];
    $images = $_FILES['foto_kegiatan']['name'];

    
//cek dulu jika ada gambar produk jalankan coding ini
if($images != "") 
$ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
$x = explode('.', $images); //memisahkan nama file dengan ekstensi yang diupload
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['foto_kegiatan']['tmp_name'];   
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
              move_uploaded_file($file_tmp, '../berkas/dokumentasi/'.$images); //memindah file gambar ke folder gambar
                // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                $query = "UPDATE dokumentasi set  tgl_kegiatan='$tgl_kegiatan',nama_kegiatan='$nama_kegiatan', deskripsi_kegiatan='$deskripsi',foto_kegiatan='$images' where id_dokumentasi='$id'";
                $result = mysqli_query($koneksi, $query);
                // periska query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                         " - ".mysqli_error($koneksi));
                } else {
                  //tampil alert dan akan redirect ke halaman index.php
                  //silahkan ganti index.php sesuai halaman yang akan dituju
                  echo "<script>alert('Data berhasil diubah.');window.location='data-dokumentasi.php';</script>";
                }

          } else {     
           //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
              echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png atau jpeg.');window.location='edit-dokumentasi.php';</script>";
          }
} else if (isset($_POST['submit'])){
	// membuat variabel untuk menampung data dari form
  $tgl_kegiatan = $_POST['tgl_kegiatan'];
  $nama_kegiatan   = $_POST['nama_kegiatan'];
  $deskripsi= $_POST['deskripsi_kegiatan'];
  $images = $_FILES['foto_kegiatan']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($images != "") 
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $images); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto_kegiatan']['tmp_name'];   
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../berkas/dokumentasi/'.$images); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO dokumentasi (tgl_kegiatan, nama_kegiatan, deskripsi_kegiatan, foto_kegiatan) VALUES ('$tgl_kegiatan','$nama_kegiatan', '$deskripsi','$images')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='data-dokumentasi.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png atau jpeg.');window.location='tambah-dokumentasi.php';</script>";
            }
} else {
   $query = "INSERT INTO dokumentasi (tgl_kegiatan, nama_kegiatan, deskripsi_kegiatan, foto_kegiatan) VALUES ('$tgl_kegiatan','$nama_kegiatan','$deskripsi', '$images')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='data-dokumentasi.php';</script>";
                  }
}

 
?>