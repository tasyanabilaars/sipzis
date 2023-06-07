<?php 
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('include/head.php'); ?>
  <title>Tambah Pengurus | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="#">Pengurus</a></div>
                <div class="breadcrumb-item active">Tambah Pengurus</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Tambah Pengurus</h2>
              <p class="section-lead">Berisi formulir untuk menambah data pengurus DKM Masjid Al - Hidayah</p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Tambah Pengurus</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b> Harap diisi dengan lengkap dan benar
                    </div>
                      <form action="act-pengurus.php" method="POST" enctype ="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Masukkan Nama Anda" class="form-control" required>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>Jabatan</label>
                            <input type="text" class="form-control"  name="jabatan" placeholder="Contoh : Bendahara"  required/>
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label for="Foto">Foto</label>
                          <input type="file" name="foto" class="form-control sm"  required>
                        </div>
                        
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" name="simpan">Simpan</button>
                          <button class="btn btn-danger" type="reset" onclick="history.back(-1)">Kembali</button>
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
