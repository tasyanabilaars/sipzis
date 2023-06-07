<?php
require 'koneksi.php';
$query = "SELECT * FROM zakatfitrah";
$result = mysqli_query($koneksi, $query);
?>


<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- My icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- My AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Owl Carousel min.css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
      integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Owl Carousel Theme -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
      integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- My Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- My Style -->
    <link rel="stylesheet" href="assets/css/responsive-style.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>SIPZIS</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/img/icon.png" class="me-3 rounded-circle" alt="brand" />
          <span class="text-dark">sipzis</span>
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home-profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home-dokumentasi.php">Dokumentasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home-kerjasama.php">Kerjasama</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Donasi </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="donasi-zakat.php">Zakat Fitrah</a></li>
                <li><a class="dropdown-item" href="donasi-infaq.php">Infaq (Warga)</a></li>
                <li><a class="dropdown-item" href="donasi-sedekah.php">Sedekah (Umum)</a></li>
                <li><a class="dropdown-item" href="data-donasi.php">Laporan Donasi</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home-kontak.php">Kontak</a>
            </li>
          </ul>
          <a href="admin/login.php" class="btn btn-primary">Sign In</a>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section class="banner-donasi">
      <div class="banner-carve-donasi">
        <div class="overlay-donasi">
          <h1>DATA LAPORAN DONASI ZIS</h1>
          <p>- DKM Masjid Al - Hidayah -</p>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->

      <section class="data-zakat">
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="3000">
          <h3>Data Laporan Pembayaran<span> Zakat Fitrah</span></h3>
        </div>
  
        <form action="" method="GET" class="data ml-5" data-aos="fade-up" data-aos-duration="3000">
          <div class="row">
            <div class="form-group mr-3 d-flex justify-content-center">
              <input type="date" class="form-control" name="tglawal" />
              <button class="btn-data btn-primary btn-lg ml-5" name="tampil">Tampilkan</button>
              <?php
              if(isset($_GET['tampil'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                  echo '<a href="donasi-zakat.php" class="btn-data btn-lg btn-success">Reset</a>';
              ?>
            </div>
          </div>
        </form>
  
        <div class="card-body">
          <div class="table-responsive " data-aos="fade-up" data-aos-duration="3000">
                          <table class="table table-bordered table-md d-flex justify-content-center">
                            <tr class="row-text text-center text-primary ">
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama</th>
                              <th>Jumlah Tanggungan</th>
                              <th>Total</th>
                            </tr>
                            <?php
  
                            $nomor = 1;
                            if(isset($_GET['tanggal'])) {
                              $tglawal = $_GET['tanggal'];
                              $tampil = mysqli_query($koneksi,"SELECT *FROM zakatfitrah where tgl_donasi '".$tglawal."' ORDER BY id_zakat DESC ");
                            } else {
                              $tampil = mysqli_query($koneksi,"SELECT * FROM zakatfitrah");
                            } while ($row=mysqli_fetch_array($tampil)) {
                              ?>
                            <tr class="row-text">
                              <td> <?= $nomor++;?></td>
                              <td><?= $row["tgl_donasi"]; ?></td>
                              <td><?= $row["nama"]; ?></td>
                              <td><?= $row["jml_tanggungan"]; ?></td>
                              <td>Rp <?php echo number_format($row['total'],0,',','.'); ?></td>
                            </tr>
                            <?php } ?>
                          </table>
  
                        </div>
                      </div>
      </section>

      
      <section class="data-zakat">
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="3000">
          <h3>Data Laporan Pembayaran<span> Infaq</span></h3>
        </div>
        
        <form action="" method="GET" class="data ml-5" data-aos="fade-up" data-aos-duration="3000">
          <div class="row">
            <div class="form-group mr-3 d-flex justify-content-center">
              <input type="date" class="form-control" name="tanggal" />
              <button class="btn-data btn-primary btn-lg ml-5" name="tampil">Tampilkan</button>
              <?php
              if(isset($_GET['tampil'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                  echo '<a href="donasi-zakat.php" class="btn-data btn-lg btn-success">Reset</a>';
              ?>
            </div>
          </div>
        </form>
  
        <div class="card-body">
          <div class="table-responsive " data-aos="fade-up" data-aos-duration="3000">
                          <table class="table table-bordered table-md d-flex justify-content-center">
                            <tr class="row-text text-center text-primary ">
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>Total</th>
                            </tr>
                            <?php
  
                            $nomor = 1;
                            if(isset($_GET['tanggal'])) {
                              $tglawal = $_GET['tanggal'];
                              $tampil = mysqli_query($koneksi,"SELECT *FROM infaq where tgl_donasi '".$tglawal."' ORDER BY id_zakat DESC ");
                            } else {
                              $tampil = mysqli_query($koneksi,"SELECT * FROM infaq");
                            } while ($row=mysqli_fetch_array($tampil)) {
                              ?>
                            <tr class="row-text">
                              <td> <?= $nomor++;?></td>
                              <td><?= $row["tgl_donasi"]; ?></td>
                              <td><?= $row["nama"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td>Rp <?php echo number_format($row['total'],0,',','.'); ?></td>
                            </tr>
                            <?php } ?>
                          </table>
  
                        </div>
                      </div>
      </section>



      <section class="data-zakat">
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="3000">
          <h3>Data Laporan Pembayaran<span> Sedekah</span></h3>
        </div>
      
        <form action="" method="GET" class="data ml-5" data-aos="fade-up" data-aos-duration="3000">
          <div class="row">
            <div class="form-group mr-3 d-flex justify-content-center">
              <input type="date" class="form-control" name="tanggal" />
              <button class="btn-data btn-primary btn-lg ml-5" name="tampil">Tampilkan</button>
              <?php
              if(isset($_GET['tampil'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                  echo '<a href="donasi-zakat.php" class="btn-data btn-lg btn-success">Reset</a>';
              ?>
            </div>
          </div>
        </form>
      
        <div class="card-body">
          <div class="table-responsive " data-aos="fade-up" data-aos-duration="3000">
                          <table class="table table-bordered table-md d-flex justify-content-center">
                            <tr class="row-text text-center text-primary ">
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>Total</th>
                            </tr>
                            <?php
      
                            $nomor = 1;
                            if(isset($_GET['tanggal'])) {
                              $tglawal = $_GET['tanggal'];
                              $tglakhir = $_GET['tanggal'];
                              $tampil = mysqli_query($koneksi,"SELECT *FROM sedekah where tgl_donasi '".$tglawal."' ORDER BY id_zakat DESC ");
                            } else {
                              $tampil = mysqli_query($koneksi,"SELECT * FROM sedekah");
                            } while ($row=mysqli_fetch_array($tampil)) {
                              ?>
                            <tr class="row-text">
                              <td> <?= $nomor++;?></td>
                              <td><?= $row["tgl_donasi"]; ?></td>
                              <td><?= $row["nama"]; ?></td>
                              <td><?= $row["alamat"]; ?></td>
                              <td>Rp <?php echo number_format($row['total_donasi'],0,',','.'); ?></td>
                            </tr>
                            <?php } ?>
                          </table>
      
                        </div>
                      </div>
      </section>

    <footer class="footer-section">
      <div class="container">
        <div class="row mt-4">
          <p class="copyright text-secondary text-center">
            Copyright &copy; 2023 All rights reserved | By
            <a href="" class="text-primary"> Tasya Nabila Arsy </a>
          </p>
        </div>
      </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Aos Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>

    <!-- Add Drop Shadow -->
    <script>
      window.addEventListener("scroll", (e) => {
        const nav = document.querySelector(".navbar");
        if (window.pageYOffset > 0) {
          nav.classList.add("drop-shadow");
        } else {
          nav.classList.remove("drop-shadow");
        }
      });
    </script>
  </body>
</html>
