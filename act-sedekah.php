<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include 'koneksi.php';

	//membuat variabel untuk menampung data dari form
  $tgl_donasi = date("Y-m-d");
  $nama   = $_POST['nama_donatur'];
  $no_hp = $_POST['no_hp'];
  $jenis_donasi   = $_POST['jenis_donasi'];
  $alamat   = $_POST['alamat'];
  $total = $_POST['total'];
  $bukti_donasi = $_FILES['bukti_donasi']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($bukti_donasi != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $bukti_donasi); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['bukti_donasi']['tmp_name'];   
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'berkas/bukti/bukti-sedekah/'.$bukti_donasi); //memindah file gambar ke folder gambar

                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)

                  $query_donasi = "INSERT INTO donasi (nama_donatur, no_hp, alamat, jenis_donasi, total, bukti_donasi) VALUES ('$nama','$no_hp','$alamat','$jenis_donasi','$total','$bukti_donasi')";
      
                  $result_donasi = mysqli_query($koneksi, $query_donasi);
            
                  //dapetin id dari proses insert diatas
                  $id_donasi = mysqli_insert_id($koneksi);
            
                  $query_sedekah = "INSERT INTO sedekah (id_donasi) VALUES ('$id_donasi')";
                  
                  $result_sedekah = mysqli_query($koneksi, $query_sedekah);  
                  // periska query apakah ada error
                  if(!$result_donasi){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Donasi BERHASIL dilakukan!');window.location='donasi-sedekah.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya JPG atau PNG.');window.location='donasi-sedekah.php';</script>";
            }
} else {

  $query_donasi = "INSERT INTO donasi (nama_donatur, no_hp, alamat, jenis_donasi, total, bukti_donasi) VALUES ('$nama','$no_hp','$alamat','$jenis_donasi','$total','$bukti_donasi')";
  $result_donasi = mysqli_query($koneksi, $query_donasi);

  //dapetin id dari proses insert diatas
  $id_donasi = mysqli_insert_id($koneksi);

  $query_sedekah = "INSERT INTO sedekah (id_donasi) VALUES ('$id_donasi')";
  $result_sedekah = mysqli_query($koneksi, $query_sedekah);  

  // periska query apakah ada error
  if(!$result_sedekah){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
  } else {
    
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Donasi BERHASIL dilakukan.');window.location='donasi-sedekah.php';</script>";
                  }
}

 
?>