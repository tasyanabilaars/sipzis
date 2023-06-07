<?php 
  session_start();

  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  include '../koneksi.php';
  $username = $_SESSION['username'];
  $id = $_GET['id_pengurus'];
  $query = "SELECT * FROM pengurus where id_pengurus=$id";
  $result = mysqli_query($koneksi,$query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('include/head.php'); ?>
  <title>Ubah Pengurus | SIPZIS</title>
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
                <div class="breadcrumb-item active">Ubah Pengurus</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Ubah Data Pengurus</h2>
              <p class="section-lead">Berisi formulir untuk mengubah data pengurus DKM Masjid Al - Hidayah</p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Ubah Data Pengurus</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Silahkan data diisi dengan lengkap dan benar
                    </div>
                      <form action="act-pengurus.php" method="POST" enctype ="multipart/form-data">
                        <div class="row">
                          <input type="hidden" name="id" value='<?php echo $row["id_pengurus"] ?>'>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label>Periode Kepengurusan</label>
                            <input type="text" name="periode" class="form-control" required/>
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label for="Foto">Foto</label>
                          <input type="file" name="foto" placeholder="Format Foto JPG/PNG" class="form-control sm" required/>

                        </div>
                        
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" name="edit-pengurus">Simpan</button>
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
