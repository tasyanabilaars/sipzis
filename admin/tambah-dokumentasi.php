<?php 
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  $username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="id">
  <?php include('include/head.php'); ?>
  <title>Tambah Dokumentasi | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="index.php">Beranda</a></div>
                <div class="breadcrumb-item">Dokumentasi</div>
                <div class="breadcrumb-item active">Tambah Dokumentasi</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Tambah Dokumentasi Kegiatan</h2>
              <p class="section-lead">Berisi formulir untuk menambah dokumentasi kegiatan Masjid Al - Hidayah</p>
            </div>


            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Tambah Dokumentasi</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Silahkan isi data dibawah ini dengan benar dan lengkap
                    </div>
                      <form action="act-dokumentasi.php" method="POST" enctype ="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" name="tgl_kegiatan" class="form-control" required>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>Nama Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Masukkan Jenis Kegiatan"  name="nama_kegiatan" required/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" placeholder="Masukkan Detail Kegiatan" class="form-control" required>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>Foto</label>
                            <input type="file" class="form-control" placeholder="Format Foto JPG/PNG" name="images"required/>
                          </div>
                        </div>
                        
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" name="submit">Simpan</button>
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