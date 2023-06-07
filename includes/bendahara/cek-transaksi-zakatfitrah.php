<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:admin/login.php?pesan=Belum Login");
  }
  include '../koneksi.php';
  $username = $_SESSION['username'];
  
  $id = $_GET['id_zakat'];
  $query = "SELECT * FROM zakatfitrah WHERE id_zakat='$id'";
  $result = mysqli_query($koneksi,$query);
  $row = mysqli_fetch_assoc($result);

  //mengubah status pembayaran
  if (isset($_POST['submit'])){
    $id = $_POST['id_zakat'];
    $status = $_POST['status'];
    
    $query = "UPDATE zakatfitrah SET status='$status' where id_zakat='$id'";
    if (mysqli_query($koneksi, $query) == "true") {
        echo "<script>alert('Donasi Zakat BERHASIL dikonfirmasi');
        document.location.href='data-zakatfitrah.php';</script>";
    } else { 
        echo "<script>alert('Donasi Zakat GAGAL dikonfirmasi');
        document.location.href='data-zakatfitrah.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <title>Cek Transaksi Zakat Fitrah | SIPZIS</title>
  <?php include('include/head.php'); ?>
<body>
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
              <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
              <div class="breadcrumb-item"><a href="#">Infaq</a></div>
              <div class="breadcrumb-item">Cek Pembayaran</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title"></h2>
            <p class="section-lead">
              Cek Pembayaran Donasi Infaq
            </p>
            <div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Pembayaran Donasi Zakat Fitrah</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b> Silahkan konfirmasi pembayaran donasi
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="row">
                          <input type="hidden" name="id_zakat" value='<?php echo $row["id_zakat"]; ?>' >
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_donasi" value='<?php echo $row["tgl_donasi"]; ?>' readonly ="readonly" class="form-control" required>
                          </div>
                          <div class="form-group col-md-12 mb-2">
                            <label for="username">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control"  name="nama_kk"  value="<?= $row['nama_kk']; ?>" readonly="readonly"required />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="alamat">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp" value="<?= $row['no_hp']; ?>" readonly="readonly" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $row['alamat']; ?>" readonly="readonly" required>
                          </div>
                          <div class="form-group col-md-12 mb-2">
                            <label for="total" >Total</label>
                            <input type="text" class="form-control" name="total" value="<?= $row['total']; ?>" readonly="readonly" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label for="total">Bukti Donasi</label>
                            <br>
                            <center><img src="../berkas/bukti/bukti-zakat/<?php echo $row['bukti_donasi']; ?>" class="img-responsive zoom" width="20%"></center>
                          </div>
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
                          <button class="btn btn-primary" name="submit">Simpan</button>
                          <button class="btn btn-secondary" type="reset" onclick="history.back(-1)">Kembali</button>
                        </div>
                      </form>            
                  </div>
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
    <style>
        .zoom {
          transition: transform .2s; /* Animation */
          width: 30% ;
          margin: 0 auto;
        }
        
        .zoom:hover {
          transform: scale(2.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        </style>
    
</body>
</html>