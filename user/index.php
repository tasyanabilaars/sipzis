<?php
    session_start();
    
    if($_SESSION['level']==""){
        header("location:donasi-infaq.php?pesan=Belum Login");
    }
    
    include '../koneksi.php';
    
    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='username'";
    $result = mysqli_query($koneksi,$query);
?>

<!DOCTYPE html>
<html lang="id">
  <title>Beranda Jamaah | SIPZIS</title>
  <?php include('include/head.php'); ?>
  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!-- Navbar -->
        <?php include('include/navbar.php'); ?>
        <!-- End Navbar -->

        <!-- Sidebar -->
        <?php include('include/sidebar.php'); ?>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <br>
            <h1>Selamat Datang <?= $username; ?></h1>
          </section>
        </div>

        <!-- Footer -->
        <?php include('include/footer.php'); ?>
        <!-- End Footer -->
      </div>
    </div>

    <!-- Foot -->
    <?php include('include/foot.php'); ?>
    <!-- End Foot -->
  </body>
</html>
