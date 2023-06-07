<?php

require 'koneksi.php';
$query = "SELECT * from penerimaan";
$result = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="en">
  <?php include ('includes/head.php')?>
  <body>
    <?php include ('includes/navbar.php')?>

    <!-- Hero Section -->
    <section class="banner-kerjasama">
      <div class="banner-carve-kerjasama">
        <div class="overlay-kerjasama">
          <h1>PENYALURAN ZAKAT</h1>
          <br>
          <p>- Masjid Al - Hidayah -</p>

        </div>
      </div>
    </section>
    <!-- End Hero Section -->


    <section>
      <div class="section-title text-center" data-aos= "fade-up" data-aos-duration="1000">
        <h3>PENYALURAN<span>
          ZAKAT</span></h3>
      </div>

                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-md d-flex justify-content-center">
                          <tr class="row-text text-center text-primary ">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Penerima</th>
                            <th>Alamat</th>
                            <th>Uang</th>
                            <th>Beras</th>
                          </tr>
                          <?php
                           
                           $batas = 5;
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
                          <tr class="row-text text-center">
                              <td><?= $nomor++; ?></td>
                              <td><?= $row["tgl_penerima"]; ?></td>
                              <td><?= $row["penerima"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td>Rp <?php echo number_format($row['jml_uang'],0,',','.'); ?></td>
                              <td><?php echo $row["jml_beras"]; ?></td>
                          </tr>
                          <?php } ?>
                        </table>

                      </div>
                    </div>
                    
                  </section>

                  <div class="card-footer">
                    <nav>
                      <ul class="pagination text-primary mb-0">
                        <li class="page-item">
                          <a class="page-link" <?php if($halaman > 1) { echo "href= '?halaman = $previous'";} ?>> <i class="uil uil-angle-double-left"></i>
                        </a>
                        </li>
                        <?php for($x=1;$x<=$total_halaman;$x++) {
                          ?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                        </li>
                        <?php } ?>
                        <li class="page-item">
                          <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>><i class="uil uil-angle-double-right"></i>
                        </a>
                        </li>
                      </ul>
                    </nav>
                  </div>




    <!-- Footer -->
    <?php include('includes/footer.php') ?>
    <!-- End Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Aos Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>

    <!-- Add Drop Shadow -->
    <script>
      window.addEventListener('scroll', (e) => {
        const nav = document.querySelector('.navbar');
        if (window.pageYOffset > 0) {
          nav.classList.add("drop-shadow");
        } else {
          nav.classList.remove("drop-shadow")
        }
      })
    </script>
  </body>
</html>