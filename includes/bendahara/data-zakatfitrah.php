<?php
    session_start();
    if($_SESSION['level']==""){
        header("location:../admin/login.php?pesan=Belum Login");
    }
    include '../koneksi.php';
    $username = $_SESSION['username'];

    $sql="SELECT * FROM zakatfitrah WHERE status IN(1,2,3)";
    $result=mysqli_query($koneksi,$sql) or die('gagal menampilkan data');
?>

<!DOCTYPE html>
<html lang="id">
  <title>Zakat Fitrah (Uang) | SIPZIS</title>
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
              <h2 class="section-title">Data Zakat Fitrah (Uang)</h2>
              <form action="cetak-zakatfitrah.php" method ="GET" target="_blank">
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
                    <button class="btn btn-primary btn-lg ml-3 mt-1 mb-2" name="cetak">
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
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md">
                          <tr>
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Pilihan</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Cek Pembayaran</th>
                          </tr>

                          <?php
                            $batas = 2;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "SELECT * FROM zakatfitrah WHERE jenis_zakat ='zakat_uang'");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
                            
                            $data_zakat = mysqli_query($koneksi, "SELECT * from zakatfitrah WHERE jenis_zakat = 'zakat_uang' ORDER BY tgl_donasi limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            $no = 1;
                            while($row = mysqli_fetch_array($data_zakat)){
                          ?>
                          <tr class="mx-auto">
                              <td><?= $nomor++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_donasi']));?></td>
                              <td><?= $row["nama_kk"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td><?= $row["pilihan_beras"]; ?></td>
                              <td><?= $row["jml_tanggungan"]; ?></td>
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
                              <td> <a href = 'cek-transaksi-zakatfitrah.php?id_zakat=<?=$row['id_zakat'];?>' class = "btn btn-primary mt-1" data-toggle="tooltip" title="Periksa">Periksa</a></td>
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
              <?php
                $data=mysqli_query($koneksi,"SELECT sum(total) as total from zakatfitrah WHERE jenis_zakat = 'zakat_uang' AND status IN (2)");
                $result=mysqli_fetch_array($data);?>
                <label for="Jumlah Uang" class="text-dark">Jumlah Dana</label>
                <input type="text"  value="Rp. <?php echo number_format($result['total']);?>">
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
