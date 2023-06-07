<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=Belum Login");
  }
  include '../koneksi.php';
  $data = $koneksi->query("SELECT * FROM penerimaan");
  $no=1;
  $total = 0;
  $totalberas =0;
  while($row = $data->fetch_array()){
    $total += $row["jml_uang"];
    $totalberas +=$row["jml_beras"];
  }
?>
  

<!DOCTYPE html>
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
                <div class="breadcrumb-item active">Penyaluran ZIS</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Data Penyaluran ZIS</h2>
              <form action="" method ="GET">
                <div class="row">
                  <div class="form-group ml-3">
                    <input type="date" class="form-control" name="tglawal">
                  </div>
                  <div class="form-group ml-3">
                    <input type="date" class="form-control mb-2" name="tglakhir">
                  </div>
                  <div>
                    <button class="btn btn-primary btn-lg ml-3" type="submit">Cetak</button>
                  </div>
                </div>
              </form>
              
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Data Penyaluran ZIS</h4>
                      <div class="card-header-form">
                        <div class="text-center pt-1 pb-1">
                          <a href="tambah-penyaluran.php" class="btn btn-warning btn-lg btn-round">
                            Tambah Data Penyaluran
                          </a>
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
                            $tampil = mysqli_query($koneksi,"SELECT *FROM penerimaan where tgl_penerima BETWEEN'".$tglawal."' AND '".$tglakhir."' ORDER BY id_penyaluran DESC ");
                          } else {
                            $tampil = mysqli_query($koneksi,"select * from penerimaan LIMIT $halaman_awal,$batas");
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
                              <a href = 'act-penyaluran.php?del&id_penyaluran=<?=$row['id_penyaluran'];?>' data-toggle="tooltip" title="Hapus" class="btn btn-danger text-center">Hapus</a>
                              <a  href = 'act-penyaluran.php?id_penyaluran=<?= $row['id_penyaluran'];?>' data-toggle="tooltip" title="Ubah" class="btn btn-warning text-center">Ubah</a>
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
            <div class="row">
              <div class="ml-3 mt-2">
                <label for="Jumlah Uang" class="text-dark">Jumlah Uang</label>
                <input type="text"  value="Rp. <?php echo number_format($total);?>">
              </div>
              <div class="ml-3 mt-2">
                <label for="Jumlah Beras" class="text-dark">Jumlah Beras</label>
                <input type="text" value="<?php echo ($totalberas);?> .Kg">
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
