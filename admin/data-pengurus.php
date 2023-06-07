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
  <title>Pengurus | SIPZIS</title>
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
                <div class="breadcrumb-item active">Pengurus</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Data Pengurus</h2>
              <p class="section-lead">Berisi data - data admin website SIPZIS </p>

              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Pengurus</h4>
                      <div class="card-header-form">
                        <div class="text-center pt-1 pb-1">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr>
                            <th>No</th>
                            <th>Periode Kepengurusan</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                          <?php 
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "select * from pengurus");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_pengurus = mysqli_query($koneksi, "select * from pengurus limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($row = mysqli_fetch_array($data_pengurus)){
                          ?>
                          <tr>
                              <td><?= $nomor++; ?></td>
                              <td><?= $row["periode"]; ?></td>
                              <td><img src="../berkas/pengurus/<?php echo $row["foto"]; ?>" width="50"></td>
                              <td class="text-center">
                                <a  href = "edit-pengurus.php?id_pengurus=<?= $row['id_pengurus'];?>" data-toggle="tooltip" title="Ubah" class="badge badge-warning text-center mt-1">Ubah</a>
                                <a href = 'act-pengurus.php?del&id_pengurus=<?=$row['id_pengurus'];?>' data-toggle="tooltip" title="Hapus" class="badge badge-danger text-center mt-1">Hapus</a>
                              </td>
                          </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                          <li class="page-item">
                            <a class="page-link" <?php if($halaman > 1) { echo "href= '?halaman = $previous'";} ?>> <i class="fas fa-chevron-left"></i></a>
                          </li>
                          <?php for($x=1;$x<=$total_halaman;$x++) {
                            ?>
                          <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                          </li>
                          <?php } ?>
                          <li class="page-item">
                            <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>><i class="fas fa-chevron-right"></i></a>
                          </li>
                        </ul>
                      </nav>
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
