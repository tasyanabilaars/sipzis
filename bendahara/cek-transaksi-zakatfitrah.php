<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:../admin/login.php?pesan=Belum Login");
  }
  include '../koneksi.php';
  $username = $_SESSION['username'];
  
  $id = $_GET['id_zakat'];
  $query = "SELECT * FROM donasi,zakatfitrah WHERE donasi.id_donasi = zakatfitrah.id_donasi AND id_zakat='$id'";
  $result = mysqli_query($koneksi,$query);
  $row = mysqli_fetch_assoc($result);

  if(isset($_POST['submit'])){
    $id = $_POST['id_donasi'];
    $status = $_POST['status'];
    
    $query = "UPDATE donasi SET status='$status' WHERE id_donasi='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Donasi Zakat Fitrah BERHASIL dikonfirmasi!');
        document.location.href='data-zakatfitrah.php';</script>";
    } else { 
        echo "<script>alert('Donasi Zakat Fitrah GAGAL dikonfirmasi!');
        document.location.href='data-zakatfitrah.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <?php include('include/head.php'); ?>
  <title>Cek Pembayaran Zakat Fitrah | SIPZIS</title>
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
                <div class="breadcrumb-item active">Cek Pembayaran</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Cek Pembayaran Donasi</h2>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Cek Pembayaran Donasi</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Silahkan konfirmasi pembayaran donasi
                    </div>
                      <form action="" method="POST"  enctype="multipart/form-data">
                        <div class="row">
                          <input type="hidden" name="id_donasi" value='<?php echo $row["id_donasi"]; ?>'>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_donasi" class="form-control" value='<?php echo date('d-m-Y', strtotime($row['tgl_donasi']));?>' readonly="readonly" required>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label for="nama_donatur">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control"  name="nama_donatur" value='<?php echo $row["nama_donatur"]; ?>' readonly="readonly" required/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-5 mb-2">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" class="form-control" value='<?php echo $row["no_hp"]; ?>' name="no_hp" readonly="readonly" required/>
                          </div>
                          <div class="form-group col-md-7 mb-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" value='<?php echo $row["alamat"]; ?>' name="alamat" readonly="readonly" required/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 mb-2">
                            <label for="nilai_zakat">Nilai Zakat</label>
                            <input type="text" class="form-control" value='<?php echo $row["nilai_zakat"]; ?>' name="nilai_zakat" readonly="readonly" required/>
                          </div>
                          <div class="form-group col-md-5 mb-2">
                            <label for="jumlah_tanggungan">Jumlah Tanggungan</label>
                            <input type="text" class="form-control" value='<?php echo $row["jumlah_tanggungan"]; ?>' name="jumlah_tanggungan" readonly="readonly" required/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" value='<?php echo $row["total"]; ?>' name="total" readonly="readonly" required/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="total">Bukti Donasi</label>
                            <br>
                            <center><img src="../berkas/bukti/bukti-zakat/<?php echo $row['bukti_donasi']; ?>" class="img-responsive zoom" width="50%"></center>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="0">Belum Konfirmasi</option>
                              <option value="2">Diterima</option>
                              <option value="3">Ditolak</option>
                            </select>
                          </div>
                        </div>
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" name="submit">Simpan Perubahan</button>
                          <button class="btn btn-secondary" type="reset" onclick="history.back(-1)">Kembali</button>
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

    <style>
        .zoom {
          transition: transform .2s; /* Animation */
          width: 40% ;
          margin: 0 auto;
        }
        
        .zoom:hover {
          transform: scale(2.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
  </body>
</html>
