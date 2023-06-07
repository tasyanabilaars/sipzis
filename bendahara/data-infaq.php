<?php
    session_start();
    
    if($_SESSION['level']==""){
        header("location:../admin/login.php?pesan=Belum Login");
    }
    
    include '../koneksi.php';
    
    $username = $_SESSION['username'];

    $ambildata = mysqli_query($koneksi, "SELECT * FROM user,infaq WHERE user.id_user = infaq.id_user ORDER BY tgl_donasi DESC");
    $batas = 2;
    $jumlah_data = mysqli_num_rows($ambildata);
    $total_halaman = ceil($jumlah_data / $batas);

    if (isset($_GET['halaman'])) {
      $halamanAktif = $_GET['halaman'];
    } else {
      $halamanAktif = 1;
    }

    $dataawal = ($halamanAktif * $batas) - ($batas);

    $ambildata_halaman =  mysqli_query($koneksi, "SELECT * FROM user,infaq WHERE user.id_user = infaq.id_user ORDER BY tgl_donasi DESC LIMIT $dataawal,$batas");
?>

<!DOCTYPE html>
<html lang="id">
  <title>Infaq | SIPZIS</title>
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
                <div class="breadcrumb-item active">Infaq</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Data Infaq Warga</h2>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Donasi Infaq Hari Ini</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                        <?php 
                        $tanggal = date('Y-m-d');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM infaq WHERE status IN(2) AND tgl_donasi='$tanggal'");
                        $result=mysqli_fetch_array($data);
                        echo "Rp. ". number_format($result['total'])." ,-";?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Donasi Infaq Bulan Ini</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                        <?php 
                        $bulan = date('m');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM infaq WHERE status IN(2) AND month(tgl_donasi)='$bulan'");
                        $result=mysqli_fetch_array($data);
                        echo "Rp. ". number_format($result['total'])." ,-";?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Donasi Infaq Tahun Ini</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                        <?php 
                        $tahun = date('Y');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM infaq WHERE status IN(2) AND year(tgl_donasi)='$tahun'");
                        $result=mysqli_fetch_array($data);
                        echo "Rp. ". number_format($result['total']).",-";?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form action="cetak-infaq.php" method ="GET" target="_blank">
                <div class="row">
                  <div class="form-group ml-3">
                    <label>Dari</label>
                    <input type="date" class="form-control" name="tglawal" value="<?php echo @$GET['tglawal'];?>" required="required">
                  </div>
                  <div class="form-group ml-3">
                      <label>Sampai</label>
                    <input type="date" class="form-control mb-2" name="tglakhir" value="<?php echo @$GET['tglakhir'];?>" required="required">
                  </div>
                  <div>
                    <br>
                    <button class="btn btn-primary mt-1 mb-2 btn-lg ml-3" name="cetak">
                      Cetak PDF
                    </button>
                  </div>
                </div>
              </form>


              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>INFAQ</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>No. Handphone</th>
                            <th>Alamat</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Cek Pembayaran</th>
                          </tr>
                          <?php
                          $no = 0 + $dataawal;
                          while ($row = mysqli_fetch_assoc($ambildata_halaman)) {
                            $no++;
                          ?>
                          <tr class="text-center">
                              <td><?php echo $no; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_donasi']));?></td>
                              <td><?= $row["username"]; ?></td>
                              <td><?= $row["no_hp"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
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
                              <td> <a href = 'cek-transaksi-infaq.php?id_infaq=<?=$row['id_infaq'];?>' class = "btn btn-primary mt-1" data-toggle="tooltip" title="Periksa">Periksa</a></td>
                          </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </div>

                    <?php for($i=1 ; $i <= $total_halaman ; $i++):?>
                      <?php if ($halamanAktif == $i): ?>
                        <?php endif;?>

                    <?php endfor; ?>
                    <div class="card-footer text-right">
                      <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                          <li class="page-item">
                            <a class="page-link"></a>
                          </li>
                          <?php for($x=1;$x<=$total_halaman;$x++) {
                            ?>
                          <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                          </li>
                          <?php } ?>
                          <li class="page-item">
                            <a class="page-link"></a>
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
