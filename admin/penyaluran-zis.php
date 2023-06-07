<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  include '../koneksi.php';
  $username = $_SESSION['username'];
?>
  

<!DOCTYPE html>
<title>Penyaluran Zakat | SIPZIS</title>
<html lang="id">
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
                <div class="breadcrumb-item active">Penyaluran Zakat</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Data Penyaluran Zakat</h2>

              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Donasi Zakat Fitrah (Uang)</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                      <?php 
                        $data=mysqli_query($koneksi,"select sum(total) as total from zakatfitrah");
                        $result=mysqli_fetch_array($data);
                        echo "Rp.". number_format($result['total']).",-";?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Penyaluran Zakat Fitrah (Uang)</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                      <?php 
                        $data=mysqli_query($koneksi,"select sum(jml_uang) as jml_uang from penerimaan");
                        $result=mysqli_fetch_array($data);
                        echo "Rp.". number_format($result['jml_uang']).",-";?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Sisa Dana Zakat Fitrah (Uang)</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                      <?php 
                        $a=mysqli_query($koneksi,"select sum(total) as total from zakatfitrah");
                          $result1=mysqli_fetch_array($a);
                          $b=mysqli_query($koneksi,"select sum(jml_uang) as jml_uang from penerimaan");
                          $result2=mysqli_fetch_array($b);
                          echo "Rp.". number_format($result1['total'] - $result2['jml_uang']).",-";?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Donasi Zakat Fitrah (Uang)</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                      <?php 
                        $data=mysqli_query($koneksi,"select sum(total) as total from zakatfitrah_beras");
                        $result=mysqli_fetch_array($data);
                        echo ($result['total'])."Kg";?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Penyaluran Zakat Fitrah (Uang)</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                      <?php 
                        $data=mysqli_query($koneksi,"select sum(jml_beras) as jml_beras from penerimaan");
                        $result=mysqli_fetch_array($data);
                        echo ($result['jml_beras'])."Kg";?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Sisa Dana Zakat Fitrah (Beras)</h4>
                      </div>
                      <div class="card-body" style="font-size:15px;">
                      <?php 
                        $a=mysqli_query($koneksi,"select sum(total) as total from zakatfitrah_beras");
                          $result1=mysqli_fetch_array($a);
                          $b=mysqli_query($koneksi,"select sum(jml_beras) as jml_beras from penerimaan");
                          $result2=mysqli_fetch_array($b);
                          echo ($result1['total'] - $result2['jml_beras'])."Kg";?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- FILTER TANGGAL -->
              <form action="cetak-penyaluran.php" method ="GET" target="_blank">
                <div class="row">
                  <div class="form-group ml-3">
                    <label>Dari</label>
                    <input type="date" class="form-control" name="tglawal" placeholder="tgl" value="<?php echo @$GET['tglawal'];?>">
                  </div>
                  <div class="form-group ml-3">
                    <label>Sampai</label>
                    <input type="date" class="form-control mb-2" name="tglakhir" placeholder="tgl" value="<?php echo @$GET['tglakhir'];?>">
                  </div>
                  <div>
                    <br>
                    <button class="btn btn-primary btn-lg mt-1 ml-3 mb-2" name="cetak">
                      Cetak PDF
                    </button>
                  </div>
                </div>
              </form>
              
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
                           
                           $batas = 4;
                           $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                           $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                         
                           $previous = $halaman - 1;
                           $next = $halaman + 1;
                         
                           $data = mysqli_query($koneksi, "select * from penerimaan");
                           $jumlah_data = mysqli_num_rows($data);
                           $total_halaman = ceil($jumlah_data / $batas);
                           $nomor = $halaman_awal+1;

                          if(isset($_GET['tglawal'])) {
                            $nomor = 1;
                            $tglawal = $_GET['tglawal'];
                            $tglakhir = $_GET['tglakhir'];
                            $tampil = mysqli_query($koneksi,"SELECT *FROM penerimaan where tgl_penerima BETWEEN'".$tglawal."' AND '".$tglakhir."' ORDER BY tgl_penerima ASC");
                          } else {
                            $tampil = mysqli_query($koneksi,"SELECT * from penerimaan ORDER BY tgl_penerima ASC LIMIT $halaman_awal,$batas");
                          } while ($row=mysqli_fetch_array($tampil)) {
                           
                          ?>
                          <tr class="text-center">
                              <td><?= $nomor++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_penerima']));?></td>
                              <td><?= $row["penerima"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td>Rp <?php echo number_format($row['jml_uang'],0,',','.'); ?></td>
                              <td><?php echo $row["jml_beras"]; ?></td>
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
