<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form
      $tgl_donasi = $_POST['tgl_donasi'];
	    $id_user = $_POST['id_user'];
      $total = $_POST['total'];
      $bukti = $_FILES['bukti_donasi']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($bukti != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $bukti); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['bukti_donasi']['tmp_name'];   
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../berkas/bukti/bukti-infaq/'.$bukti); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO infaq (tgl_donasi, id_user, total, bukti_donasi) VALUES ('$tgl_donasi','$id_user','$total','$bukti')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Donasi BERHASIL dilakukan!');window.location='pembayaran-donasi.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='pembayaran-donasi.php';</script>";
            }
} else {
    $query = "INSERT INTO infaq (tgl_donasi, id_user, total, bukti_donasi) VALUES ($tgl_donasi','$id_user', $total','$bukti')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Donasi BERHASIL dilakukan!');window.location='pembayaran-donasi.php';</script>";
                  }
}
 
?>