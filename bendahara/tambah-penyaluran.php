<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:../admin/login.php?pesan=Belum Login");
  }
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
  <?php include('include/head.php'); ?>
  <title>Tambah Penyaluran Zakat | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="#">Penyaluran Zakat</a></div>
                <div class="breadcrumb-item active">Tambah Data</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Tambah Penyaluran Zakat</h2>
              <p class="section-lead">Berisi formulir untuk menambah data penyaluran Zakat DKM Masjid Al - Hidayah</p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Tambah Data Penyaluran Zakat</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Silahkan isi data dengan benar dan lengkap
                    </div>
                      <form action="act-penyaluran.php" method="POST">
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_penerima" id="tgl_penerima" required class="form-control">
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label for="topik_kritik" >Penerima</label>
                            <input type="text" class="form-control" required  name="penerima" placeholder="DKM Masjid / Nama Penerima" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="deskripsi">Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" required></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label for="">Jumlah Uang</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                              </div>
                              <input type="text" class="form-control" required name="jumlah_uang" placeholder="Contoh : 350000">
                            </div>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label for="">Jumlah Beras</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Kg</div>
                              </div>
                              <input type="text" class="form-control" name="jumlah_beras" required placeholder="Contoh : 4.5">
                            </div>
                          </div>
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
