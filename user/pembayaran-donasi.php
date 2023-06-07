<?php 
  include '../koneksi.php';
  session_start();
  
  $id_user = $_SESSION['id_user'];
  $username = $_SESSION['username'];
  $query = mysqli_query($koneksi, "SELECT id_user FROM user WHERE username='$username'");
?>

<!DOCTYPE html>
<html lang="id">
  <title>Pembayaran Donasi Infaq | SIPZIS</title>
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
            <div class="section-header">
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Beranda</a></div>
                <div class="breadcrumb-item active">Donasi Infaq</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Pembayaran Donasi Infaq</h2>
              <p class="section-lead">Dikhususkan <b>untuk WARGA RW 002</b> yang ingin membayar <b>INFAQ WAJIB WARGA</b></p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Formulir Donasi Infaq</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-danger">
                      <b>No. Rekening </b>: 7256 0102 7965 532 a/n Adi S
                    </div>
                    <div class="alert alert-warning">
                      <b>Bukti Donasi </b> tipe gambar HARUS JPG / PNG
                    </div>
                      <form action="act-infaq.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                         <div class="form-group col-md-6 mb-2">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_donasi" class="form-control" required>
                         </div>
                         <div class="form-group col-md-6 mb-2">
                            <label>Total Donasi</label>
                            <input type="text" placeholder="Contoh : 100000" name="total" class="form-control" required/>
                          </div>
                        </div>
                        <div class="form-group">
                          <?php
                            $data_infaq = mysqli_query($koneksi, "SELECT id_user FROM user WHERE username='$username'");
                            while($row = mysqli_fetch_array($data_infaq)){
                          ?>
                          <input type="hidden" name="id_user" class="form-control" value="<?php echo $row['id_user']; ?>">
                        </div>
                        <?php }?>                        
                        <div class="row">
                        <div class="form-group col-md-12 mb-2">
                            <label for="Foto">Bukti Donasi</label>
                            <input type="file" name="bukti_donasi" required class="form-control sm">
                        </div>
                        </div>
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" name="donasi">Donasi</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
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