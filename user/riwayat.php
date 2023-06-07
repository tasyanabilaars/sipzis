<?php
    session_start();
    
    if($_SESSION['level']==""){
        header("location:donasi-infaq.php?pesan=Belum Login");
    }
    
    include '../koneksi.php';
    
    $username = $_SESSION['username'];
    $query = "SELECT id_user FROM infaq WHERE username='$username'";
    $result = mysqli_query($koneksi,$query);
?>

<!DOCTYPE html>
<html lang="id">
  <title>Riwayat Pembayaran | SIPZIS</title>
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
                <div class="breadcrumb-item active">Riwayat Pembayaran</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Riwayat Pembayaran Infaq</h2>

              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>RIWAYAT PEMBAYARAN INFAQ</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Total</th>
                            <th>Keterangan</th>
                          </tr>
                          <?php
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "SELECT * FROM user,infaq");
                            $no = 1;
                            $total = 0;
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_infaq = mysqli_query($koneksi, "SELECT * FROM (user JOIN infaq ON user.id_user=infaq.id_user) WHERE username='$username' ORDER BY tgl_donasi ASC limit $halaman_awal,$batas");
                            $nomor = $halaman_awal+1;
                            while($row = mysqli_fetch_array($data_infaq)){
                              $total += $row["total"];
                          ?>
                          <tr class="text-center">
                              <td><?= $no++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_donasi']));?></td>
                              <td><?= $row["username"]; ?></td>
                              <td>Rp <?php echo number_format($row['total'],0,',','.'); ?></td>
                              <td>
                              <?php if($row["status"]=='3'){
                                  echo "<p class='badge badge-danger'>Ditolak</p>";
                                }else if($row["status"]=='2'){
                                  echo "<p class='badge badge-success'>Diterima</a>";
                                }else {
                                  echo "<p class='badge badge-warning'>Menunggu Konfirmasi</a>";
                                } ?>	
                                </td>
                          </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <nav class="d-inline-block">
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
    
        <style>
        .zoom {
          transition: transform .2s; /* Animation */
          width: 50px;
          height: 50px;
          margin: 0 auto;
        }
        
        .zoom:hover {
          transform: scale(2.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        </style>
  </body>
</html>
