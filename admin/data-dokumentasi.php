<?php
    session_start();
    
    if($_SESSION['level']==""){
        header("location:login.php?pesan=Belum Login");
    }
    
    include '../koneksi.php';
    
    $username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
  <title>Dokumentasi | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="index.php">Beranda</a></div>
                <div class="breadcrumb-item active">Dokumentasi</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Dokumentasi Kegiatan</h2>
              <p class="section-lead">Berisi dokumentasi kegiatan - kegiatan di Masjid Al - Hidayah</p>


              <div class="text-right card-header-form">
                <div class="pt-1 pb-1">
                <a href="tambah-dokumentasi.php" class="btn btn-icon icon-left btn-primary mb-3"><i class="uil uil-user-plus"></i>Tambah Dokumentasi</a>
                </div>
              </div>

              <div class="row">
                <?php
                  require '../koneksi.php';

                  $query = "SELECT * FROM dokumentasi ORDER BY tgl_kegiatan ASC";
                  $query_run = mysqli_query($koneksi, $query);
                  $check_dokumentasi = mysqli_num_rows($query_run) > 0;

                  if ($check_dokumentasi)
                  {
                    while($row = mysqli_fetch_array($query_run))
                    {
                ?>
                <div class="card-content col-md-3">
                  <div class="card">
                    <div class="card-body">
                      <center><img src="../berkas/dokumentasi/<?php echo $row['foto_kegiatan']; ?>" width="100" height="100"></center>
                      <br>
                      <p class="card-title text-center"><?php echo $row['nama_kegiatan']; ?></p>
                      <p class="text-center"><?= date('d-m-Y', strtotime($row['tgl_kegiatan']));?></p>
                      <p class="card-text text-center"><?php echo $row['deskripsi_kegiatan']; ?></p>
                      <div class="text-center justify-content-center">
                        <a  href = 'edit-dokumentasi.php?id_dokumentasi=<?= $row['id_dokumentasi'];?>' data-toggle="tooltip" title="Ubah" class="btn btn-warning text-center">Ubah</a>
                        <a href = 'act-dokumentasi.php?del&id_dokumentasi=<?=$row['id_dokumentasi'];?>' data-toggle="tooltip" title="Hapus" class="btn btn-danger text-center">Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
            }
          } else 
          {
            echo "No Dokumentasi Found";
          }
          ?>
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