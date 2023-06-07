<?php 
  include '../koneksi.php';
  $username = $_SESSION['username'];
  $id = $_GET['id_user'];
  $query = "SELECT * FROM user where id_user=$id";
  $result = mysqli_query($koneksi,$query);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('include/head.php'); ?>
  <title>Ubah Admin | SIPZIS</title>
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
                <div class="breadcrumb-item active">Ubah Admin</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Ubah Admin</h2>
              <p class="section-lead">Berisi formulir untuk mengubah data admin SIPZIS Masjid Al - Hidayah</p>
            </div>

            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="align-items-center">Ubah Admin</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Catatan!</b>. Silahkan isi data dengan benar dan lengkap
                    </div>
                      <form action="act-admin.php" method="POST">
                        <div class="row">
                          <input type="hidden" name="id_user" value='<?php echo $row["id_user"] ?>'>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" readonly="readonly" value='<?= $row["username"]; ?>'>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control"  name="password" value="<?= $row['password']; ?>" readonly="readonly"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 mb-2">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" readonly="readonly" required><?= $row['alamat']; ?></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 mb-2">
                            <label>No. Handphone</label>
                            <input type="text" class="form-control"  name="no_hp" placeholder="No. WhatsApp/Aktif" required/>
                          </div>
                          <div class="form-group col-md-6 mb-2">
                            <label>Level</label>
                            <input type="text" class="form-control"  name="no_hp" value="<?= $row['level']; ?>" readonly="readonly" required/>
                          </div>
                        </div>
                        
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" name="edit-simpan">Simpan</button>
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
