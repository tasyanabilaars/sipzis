<?php
    //mengaktifkan session pada php
    session_start();
    //menghubungkan koneksi database
    include 'koneksi.php';
    
    //menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    
    //menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);
    
    //cek apakah username dan password ditemukan pada database
    if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    
    //cek jika user login sebagai admin
    if($data['level']=="1"){

            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['alamat'] = $alamat;
            $_SESSION['level'] = "1";
            
            //alihkan ke halaman dashboard admin
            header("location:admin/index.php");
            echo "<script>alert('Nama Pengguna / Kata Sandi SALAH');window.location='admin/login.php';</script>";
            
    //cek jika user sebagai jamaah    
    } else if($data['level']=="3"){

            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['alamat'] = $alamat;
            $_SESSION['level'] = "3";
            
            //alihkan ke halaman dashboard admin
            header("location:user/index.php");
            echo "<script>alert('Nama Pengguna / Kata Sandi SALAH');window.location='donasi-infaq.php';</script>";
        }

        else if($data['level']=="2"){
        
            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['alamat'] = $alamat;
            $_SESSION['level'] = "2";
        
        //alihkan ke halaman dashboard bendahara
        header("location:bendahara/index.php");
        echo "<script>alert('Nama Pengguna / Kata Sandi SALAH');window.location='admin/login.php';</script>";
    }
    } else {
        echo "<script>alert('Nama Pengguna / Kata Sandi SALAH');window.location='index.php';</script>";
    }
?>