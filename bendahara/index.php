<?php
    session_start();
    
    if($_SESSION['level']==""){
        header("location:admin/login.php?pesan=Belum Login");
    }
    
    include '../koneksi.php';
    
    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='$username' AND level = '2'";
    $result = mysqli_query($koneksi,$query);
?>

<!DOCTYPE html>
<html lang="id">
  <title>Beranda Bendahara | SIPZIS</title>
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
            <h1>Selamat Datang, <?= $username ;?></h1>
            <br>
          </section>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Donasi Zakat Fitrah</h4>
                  </div>
                  <div class="card-body" style="font-size:15px;">
                    <?php 
                    $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_uang' AND status IN(2)");
                    $result=mysqli_fetch_array($data);
                    echo "Rp.". number_format($result['total']).",-";?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Donasi Infaq</h4>
                  </div>
                  <div class="card-body" style="font-size:15px;">
                  <?php 
                    $data=mysqli_query($koneksi,"SELECT sum(total) as total from infaq WHERE status IN(2)");
                    $result=mysqli_fetch_array($data);
                    echo "Rp.". number_format($result['total']).",-";?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Donasi Sedekah</h4>
                  </div>
                  <div class="card-body" style="font-size:15px;">
                  <?php
                    $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='sedekah' AND status IN(2)");
                    $result=mysqli_fetch_array($data);
                    echo "Rp.". number_format($result['total']).",-";?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Zakat Fitrah(Beras)</h4>
                  </div>
                  <div class="card-body" style="font-size:15px;">
                    <?php 
                    $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_beras'");
                    $result=mysqli_fetch_array($data);
                    echo ($result['total'])."Kg";?>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
