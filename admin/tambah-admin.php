<?php 
  session_start();
  include '../koneksi.php';
  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('include/head.php'); ?>
  <title>Tambah Admin | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="#">Admin</a></div>
                <div class="breadcrumb-item active">Tambah Admin</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Tambah Admin</h2>
              <p class="section-lead">Berisi formulir untuk menambah admin SIPZIS Masjid Al - Hidayah</p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Tambah Admin</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Silahkan isi data dengan benar dan lengkap
                    </div>
                      <form action="act-admin.php" method="POST">
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Nama</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Anda" required/>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>Kata Sandi</label>
                            <input type="text" class="form-control"  name="password" placeholder="Masukkan Kata Sandi" required/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Alamat</label>
                            <input type="text" name="alamat" placeholder="Masukkan Alamat Lengkap" class="form-control" required/>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>No. Handphone</label>
                            <input type="text" class="form-control"  name="no_hp" placeholder="No. WhatsApp/Aktif" required/>
                          </div>
                        </div>
                          <div class="form-group mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="custom-select text-center" name="level" required>
                              <option selected disabled>-- Level --</option>
                              <option value="1" required>1 (Admin)</option>
                            </select>
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
