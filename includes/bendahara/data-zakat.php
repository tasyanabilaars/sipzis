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

                            $data = mysqli_query($koneksi, "SELECT * from  zakatfitrah WHERE jenis_zakat = 'zakat_beras'");
                            $no = 1;
                            $total = 0;
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_zakat = mysqli_query($koneksi, "SELECT * from zakatfitrah WHERE jenis_zakat = 'zakat_beras' ORDER BY tgl_donasi ASC limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($row = mysqli_fetch_array($data_zakat)){
                              $total += $row["total"];
                          ?>
                          <tr class="text-center">
                              <td><?= $no++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_donasi']));?></td>
                              <td><?= $row["nama_kk"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td><?= $row["pilihan_beras"]; ?></td>
                              <td><?= $row["jml_tanggungan"]; ?></td>
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

              <div class="mb-2 mt-2">
                <label for="Jumlah Beras" class="text-dark">Jumlah Beras</label>
                <input type="text"  value="<?php echo ($total);?> .Kg">
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
