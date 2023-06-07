<?php
session_start();
    session_start();
    
    if($_SESSION['level']==""){
        header("location:login.php?pesan=Belum Login");
    }
    
    include '../koneksi.php';
    
    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE level = 1";
    $result = mysqli_query($koneksi,$query);
    
?>

<!DOCTYPE html>
<html lang="en">
  <title>Admin | SIPZIS</title>
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
                <div class="breadcrumb-item"><a href="#">Beranda</a></div>
                <div class="breadcrumb-item active">Admin</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Data Admin</h2>
              <p class="section-lead">Berisi data - data admin SIPZIS Masjid Al - Hidayah</p>

              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Admin</h4>
                      <div class="card-header-form">
                        <div class="text-center pt-1 pb-1">
                        <a href="tambah-admin.php" class="btn btn-icon icon-left btn-primary"><i class="uil uil-user-plus"></i>Tambah Admin</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Handphone</th>
                            <th>Aksi</th>
                          </tr>
                            
                          <?php $i = 1; ?>
                          <?php foreach($result as $row): ?>
                          <tr class="text-center">
                              <td><?= $i; ?></td>
                              <td><?= $row['username']; ?></td>
                              <td class="text-left"><?= $row['alamat']; ?></td>
                              <td><?= $row['no_hp']; ?></td>
                              <td>
                                <a href = 'edit-admin.php?id_user=<?=$row['id_user'];?>' class = "badge badge-warning mt-1" data-toggle="tooltip" title="Ubah">Ubah</a>
                                <a href = 'act-admin.php?del&id_user=<?= $row['id_user'];?>' class = "badge badge-danger mt-1" data-toggle="tooltip" title="Hapus">Hapus</a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach ?>
                        </table>
                      </div>
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
    </div>

    <!-- Foot -->
    <?php include('include/foot.php'); ?>
    <!-- End Foot -->
  </body>
</html>
