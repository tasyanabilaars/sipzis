<?php
    session_start();
    if($_SESSION['level']==""){
        header("location:../admin/login.php?pesan=Belum Login");
    }
    include '../koneksi.php';
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <title>Zakat Fitrah (Beras) | SIPZIS</title>
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
                <div class="breadcrumb-item active">Zakat Fitrah</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Data Zakat Fitrah (Beras)</h2>
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
              <form action="cetak-zakat.php" method ="GET" target="_blank">
                <div class="row">
                  <div class="form-group ml-3">
                      <label>Dari</label>
                    <input type="date" class="form-control" name="tglawal" value="<?php echo @$GET['tglawal'];?>">
                  </div>
                  <div class="form-group ml-3">
                      <label>Sampai</label>
                    <input type="date" class="form-control mb-2" name="tglakhir" value="<?php echo @$GET['tglakhir'];?>">
                  </div>
                  <div>
                      <br>
                    <button class="btn btn-primary btn-lg ml-3 mb-2 mt-1" name="cetak">
                      Cetak PDF
                    </button>
                  </div>
                </div>
              </form>
              
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                  <div class="card-header">
                      <h4>ZAKAT FITRAH</h4>
                      <div class="card-header-form">
                        <div class="text-center pt-1 pb-1">
                        <a href="tambah-zakat.php" class="btn btn-icon icon-left btn-info"><i class="uil uil-user-plus"></i>Tambah Zakat (Beras)</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nilai Zakat</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                          </tr>
                          <?php
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "SELECT * FROM donasi WHERE jenis_donasi='zakat_beras'");
                            $no = 1;
                            $total = 0;
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_zakat = mysqli_query($koneksi, "SELECT * FROM donasi,zakatfitrah WHERE donasi.id_donasi = zakatfitrah.id_donasi AND jenis_donasi='zakat_beras' ORDER BY tgl_donasi DESC LIMIT $halaman_awal,$batas");
                            $nomor = $halaman_awal+1;
                            while($row = mysqli_fetch_array($data_zakat)){
                              $total += $row["total"];
                          ?>
                          <tr class="text-center">
                              <td><?= $nomor++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_donasi']));?></td>
                              <td><?= $row["nama_donatur"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td><?= $row["nilai_zakat"]; ?></td>
                              <td><?= $row["jumlah_tanggungan"]; ?></td>
                              <td><?= $row["total"]; ?> Kg</td>
                              <td>
                              <a href ='edit-zakat.php?id_zakat=<?= $row['id_zakat'];?>' class="badge badge-warning mt-1" data-toggle="tooltip" title="Ubah">Ubah</a>
                              <a href = 'act-zakat.php?del&id_zakat=<?= $row['id_zakat'];?>' class = "badge badge-danger mt-1" data-toggle="tooltip" title="Hapus">Hapus</a>
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
