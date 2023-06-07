<?php
    session_start();
    if($_SESSION['level']==""){
        header("location:../admin/login.php?pesan=Belum Login");
    }
    include '../koneksi.php';
    $username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="id">
<title>Penyaluran Zakat | SIPZIS</title>
<body>
  <?php include('include/head.php'); ?>
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
              <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
              <div class="breadcrumb-item">Penyaluran Zakat Fitrah</a></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Penyaluran Zakat Fitrah</h2>
            <div class="card-header-form">
              <div class="float-right pt-1 pb-1 ml-2">
                <a href="penyaluran-zis.php" class="btn btn-icon icon-left btn-dark"><i class="uil uil-file"></i>Laporan Data Penyaluran</a>
              </div>
            </div>
            <br>
            <br>
            <div class="row mt-4">
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Donasi Zakat Fitrah Uang Hari Ini</h4>
                    </div>
                    <div class="card-body" style="font-size:15px;">
                      <?php 
                      $tanggal = date('Y-m-d');
                      $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_uang' AND status IN(2) AND tgl_donasi='$tanggal'");
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
                      <h4>Donasi Zakat Fitrah Uang Bulan Ini</h4>
                    </div>
                    <div class="card-body" style="font-size:15px;">
                      <?php 
                      $bulan = date('m');
                      $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_uang' AND status IN(2) AND month(tgl_donasi)='$bulan'");
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
                      <h4>Donasi Zakat Fitrah Uang Tahun Ini</h4>
                    </div>
                    <div class="card-body" style="font-size:15px;">
                      <?php 
                      $tahun = date('Y');
                      $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_uang' AND status IN(2) AND year(tgl_donasi)='$tahun'");
                      $result=mysqli_fetch_array($data);
                      echo "Rp. ". number_format($result['total']).",-";?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Donasi Zakat Fitrah Beras Hari Ini</h4>
                    </div>
                    <div class="card-body" style="font-size:15px;">
                      <?php 
                      $tanggal = date('Y-m-d');
                      $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_beras' AND tgl_donasi='$tanggal'");
                      $result=mysqli_fetch_array($data);
                      echo "".($result['total'])." Kg";?>
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
                      <h4>Donasi Zakat Fitrah Beras Bulan Ini</h4>
                    </div>
                    <div class="card-body" style="font-size:15px;">
                      <?php 
                      $bulan = date('m');
                      $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_beras' AND month(tgl_donasi)='$bulan'");
                      $result=mysqli_fetch_array($data);
                      echo "". ($result['total'])." Kg";?>
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
                      <h4>Donasi Zakat Fitrah Beras Tahun Ini</h4>
                    </div>
                    <div class="card-body" style="font-size:15px;">
                      <?php 
                      $tahun = date('Y');
                      $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_beras' AND year(tgl_donasi)='$tahun'");
                      $result=mysqli_fetch_array($data);
                      echo "". ($result['total'])." Kg";?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Data Penyaluran Zakat</h4>
                      <div class="card-header-form">
                        <div class="text-center pt-1 pb-1">
                        <a href="tambah-penyaluran.php" class="btn btn-icon icon-left btn-info"><i class="uil uil-user-plus"></i>Tambah Data Penyaluran</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Penerima</th>
                            <th>Alamat</th>
                            <th>Uang</th>
                            <th>Beras</th>
                            <th>Aksi</th>
                          </tr>
                          <?php
                           
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                          
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                         
                            $data = mysqli_query($koneksi, "SELECT * FROM penyaluran");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
                            $nomor = $halaman_awal+1;

                            $tampil = mysqli_query($koneksi,"SELECT * from penyaluran ORDER BY tgl_penerima DESC LIMIT $halaman_awal,$batas");
                            while ($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <tr class="text-center">
                              <td><?= $nomor++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_penerima']));?></td>
                              <td><?= $row["penerima"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td>Rp <?php echo number_format($row['jumlah_uang'],0,',','.'); ?></td>
                              <td><?php echo $row["jumlah_beras"]; ?></td>
                              <td>
                                <a  href = "edit-penyaluran-zis.php?id_penyaluran=<?= $row['id_penyaluran'];?>" data-toggle="tooltip" title="Ubah" class="badge badge-warning text-center mt-1">Ubah</a>
                              <a href = 'act-penyaluran.php?del&id_penyaluran=<?=$row['id_penyaluran'];?>' data-toggle="tooltip" title="Hapus" class="badge badge-danger text-center mt-1">Hapus</a>
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
        </div>
        </section>
      </div>
      <!-- Foot -->
      <?php include('include/footer.php'); ?>
      <!-- End Foot -->
    </div>
  </div>

  <!-- Foot -->
  <?php include('include/foot.php'); ?>
  <!-- End Foot -->
</body>
</html>