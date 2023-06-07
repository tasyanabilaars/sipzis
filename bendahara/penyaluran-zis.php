<?php
  session_start();
  if($_SESSION['level']==""){
    header("location:../admin/login.php?pesan=Belum Login");
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

              
            <div class="card">
              <!-- FILTER TANGGAL -->
              <form action="" method="GET">
                <div class="row mt-2">
                  <div class="col-md-3">
                    <div class="form-group ml-3">
                      <label>Mulai Tanggal</label>
                      <input autocomplete="off" type="date" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control" placeholder="Mulai Tanggal" required="required">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group ml-3">
                      <label>Sampai Tanggal</label>
                      <input autocomplete="off" type="date" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control" placeholder="Sampai Tanggal" required="required">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <br/>
                      <input type="submit" value="TAMPILKAN" name="tampil" class="btn btn-success btn-lg mt-1 mb-2">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <br/>
                      <button class="btn btn-light btn-lg  mt-1 mb-2" type="reset" onclick="history.back(-1)">RESET</button>
                    </div>
                  </div>
                
                </div>
              </form>
            </div>
            
            <div class="box box-info">
              <div class="box-header">
                <h4 class="text-center mb-5">Laporan Penyaluran Zakat</h4>
              </div>
              <div class="box-body">
                <?php 
                if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
                  $tgl_dari = $_GET['tanggal_dari'];
                  $tgl_sampai = $_GET['tanggal_sampai'];
                ?>

                <div class="row">
                  <div class="col-lg-6 mr-2">
                    <table class="table table">
                      <tr>
                        <th width="40%">Dari Tanggal</th>
                        <th width="1%">:</th>
                        <th><?php echo date('d-m-Y', strtotime($tgl_dari));?></th>
                        
                      </tr>
                      <tr>
                        <th>Sampai Tanggal</th>
                        <th>:</th>
                        <th><?php echo date('d-m-Y', strtotime($tgl_sampai));?></th>
                      </tr>
                    </table>           
                  </div>
                </div>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%" rowspan="2">No</th>
                      <th width="15%" rowspan="2" class="text-center">Tanggal</th>
                      <th rowspan="2" class="text-center">Penerima</th>
                      <th rowspan="2" class="text-center">Alamat</th>
                      <th colspan="2" class="text-center">Penyaluran Zakat</th>
                    </tr>
                    <tr>
                      <th class="text-center">Jumlah Uang</th>
                      <th class="text-center">Jumlah Beras</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $jumlah_uang=0;
                    $jumlah_beras=0;

                    $data = mysqli_query($koneksi,"SELECT * FROM penyaluran WHERE tgl_penerima AND date(tgl_penerima)>='$tgl_dari' AND date(tgl_penerima)<='$tgl_sampai' ORDER BY tgl_penerima ASC");
                    
                    while($d = mysqli_fetch_array($data)){

                      if($d['jumlah_uang']){
                        $jumlah_uang += $d['jumlah_uang'];
                      }
                      if($d['jumlah_beras']){
                        $jumlah_beras += $d['jumlah_beras'];
                      }
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_penerima'])); ?></td>
                        <td><?php echo $d['penerima']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td class="text-center">
                          <?php 
                          if($d['jumlah_uang']){
                            echo "Rp. ".number_format($d['jumlah_uang'])." ,-";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          if($d['jumlah_beras']){
                            echo "".($d['jumlah_beras'])." Kg";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                      </tr>
                      <?php 
                    }
                    ?>
                    <tr>
                      <th colspan="4" class="text-right">TOTAL PENYALURAN BULAN INI</th>
                      <td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($jumlah_uang)." ,-"; ?></td>
                      <td class="text-center text-bold text-success"><?php echo "".($jumlah_beras)." Kg"; ?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">TOTAL ZAKAT FITRAH TAHUN INI</th>

      
                      <td class="text-center text-bold text-dark">
                        <?php
                        $tahun = date('Y');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_uang' AND status IN(2) AND year(tgl_donasi)='$tahun'");
                        $result=mysqli_fetch_array($data);
                        echo "Rp. ". number_format($result['total']).",-";?>
                      </td>
     
                      <td class="text-center text-bold text-dark">
                        <?php
                        $tahun = date('Y');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_beras' AND year(tgl_donasi)='$tahun'");
                        $result=mysqli_fetch_array($data);
                        echo "".($result['total'])." Kg";?>
                      </td>
                      
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">SALDO</th>
                      <td class="text-center text-bold text-danger text-bold">
                        <?php
                        $tahun = date('Y');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_uang' AND status IN(2) AND year(tgl_donasi)='$tahun'");
                        $result=mysqli_fetch_array($data);
                        echo "Rp. ". number_format($result['total']- $jumlah_uang).",-";?>
                      </td>
                      
                      <td class="text-center text-bold text-danger text-bold">
                        <?php
                        $tahun = date('Y');
                        $data=mysqli_query($koneksi,"SELECT sum(total) AS total FROM donasi WHERE jenis_donasi='zakat_beras' AND year(tgl_donasi)='$tahun'");
                        $result=mysqli_fetch_array($data);
                        echo "".($result['total'] - $jumlah_beras)." Kg";?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <a href="cetak-penyaluran.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-lg btn-dark mb-2"><i class="fa fa-file-pdf"></i> &nbsp CETAK PDF</a>
              </div>
              <?php 
              } else{
              ?>

                <div class="alert alert-light text-center">
                  <b>Silahkan Filter Tanggal Terlebih Dulu</b>
                </div>
                <div class="text-right">
                  <button class="btn btn-danger" type="reset" onclick="history.back(-1)">Kembali</button>
                </div>

              <?php
              }
              ?>

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
