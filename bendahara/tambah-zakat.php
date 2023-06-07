<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  include '../koneksi.php';
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
  <?php include('include/head.php'); ?>
  <title>Tambah Zakat | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="#">Zakat Fitrah</a></div>
                <div class="breadcrumb-item active">Tambah Data</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Tambah Data Zakat Fitrah (Beras)</h2>
              <p class="section-lead">Berisi formulir menambah data Zakat Fitrah (Beras) DKM Masjid Al - Hidayah</p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Tambah Data Zakat Fitrah</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Harap diisi dengan lengkap dan benar
                    </div>
                      <form action="act-zakat.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_donasi" class="form-control" required >
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label for="nama_kk">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control"  name="nama_donatur" placeholder="Nama Kepala Keluarga" required />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No. Aktif/WhatsApp" required>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label for="alamat" >Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" required>
                          </div>
                        </div>
                        <div class="row">
                        <input type="hidden" class="form-control" name="jenis_donasi" value="zakat_beras" readonly="readonly" required>
                          <div class="form-group col-md-6 mb-3">
                            <label for="pilihan_beras" class="form-label">Nilai Zakat</label>
                              <select class="custom-select" name="nilai_zakat" required>
                                <option selected>Nilai Zakat</option>
                                <option value="2.5" id="nilai_1" onkeyup="sum();">2.5/jiwa</option>
                              </select>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label for="jml_tanggungan" >Jumlah Tanggungan</label>
                            <input type="text" class="form-control" name="jumlah_tanggungan" id="nilai_2" onkeyup="sum();" placeholder="4" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" name="total" id="total" readonly="readonly" required>
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

    <script>
    function sum() {
      var txtFirstNumberValue = document.getElementById('nilai_1').value;
      var txtSecondNumberValue = document.getElementById('nilai_2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
        if (!isNaN(result)) {
          document.getElementById('total').value = result;
        }
    }
  </script>

    <!-- Foot -->
    <?php include('include/foot.php'); ?>
    <!-- End Foot -->
  </body>
</html>
