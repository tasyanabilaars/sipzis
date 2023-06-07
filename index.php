<!doctype html>
<html lang="id">
  <?php include ('includes/head.php')?>
  <body>
    <!-- Navbar -->
    <?php include ('includes/navbar.php')?>
    <!-- End Navbar -->
    

    <!-- Home Section -->
    <section class="home" id="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="home-content" data-aos= "fade-up" data-aos-duration="1000">
              <p class="badge fs-6 bg-dark text-light">Lakukan donasi sekarang 👍</p>
              <h1 class="text-home-bold fw-bold text-dark mt-1"><span>Satu sedekah yang tulus</span> <br> sama dengan <span> <br>
              Seribu langkah </span>menuju<span> surga</span></h1>
            </div>
            <h4 class="text-home-reguler fw-normal text-light">DKM Masjid Al - Hidayah</h4>
            <div class="home-btn mt-5">
              <a href="donasi-sedekah.php" class="btn btn-primary shadow-none">
                Donasi Sekarang
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="home-img mt-4" data-aos= "fade-up" data-aos-duration="2000"">
              <img src="assets/img/indo_july_45.png" class="w-100" alt="">
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- End Home Section -->


    <!-- Container -->
    <div class="container">
      <!-- Info Panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg" data-aos= "zoom-in" data-aos-duration="1000">
              <center><img src="assets/img/1.png" alt="employee" class="float-left"></center>
              <h4>Akses</h4>
              <p>Website dapat diakses 24 jam, dimana saja dan kapan saja</p>
            </div>
            <div class="col-lg" data-aos= "zoom-in" data-aos-duration="2000">
              <center><img src="assets/img/2.png" alt="security" class="float-left"></center>
              <h4>Keamanan</h4>
              <p>Keamanan data terjaga antar jamaah</p>
            </div>
            <div class="col-lg" data-aos= "zoom-in" data-aos-duration="3000">
              <center><img src="assets/img/3.png" alt="hires" class="float-left"></center>
              <h4>Cepat</h4>
              <p>Pembayaran donasi ZIS cepat dan mudah</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Info Panel -->

    <!-- Tentang Kami -->
    <section class="tentang" id="tentang">
      <div class="container">
        <div class="text-tentang" data-aos= "fade-up" data-aos-duration="1000">
          <h5 class="text-center fw-bold display-1 mb-3">Tentang<span class="kami"> Kami</span></h5>
        </div>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-11">
                <div class="kegiatan-img mt-3" data-aos= "fade-up" data-aos-duration="2000">
                  <img src="assets/img/masjid.jpg" alt="kegiatan" class="w-100">
                </div>
              </div>
            </div>
          </div>     
          <div class="col-md-6" data-aos= "fade-up" data-aos-duration="3000">
            <h3><span>SIPZIS</span></h3>
            <p>(Sistem Informasi Pengelolaan Zakat, Infaq dan Sedekah)</p>
            <p>SIPZIS adalah website yang diperuntukkan bagi jamaah Masjid Al - Hidayah untuk melakukan pembayaran zakat fitrah, infaq wajib (warga) serta sedekah (umum)</p>
            <a href="home-profil.php" class="btn btn-primary">Selengkapnya..</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Tentang Kami -->

    <!-- Dokumentasi Kegiatan -->
    <section class="dokumentasi" id="dokumentasi">
      <div class="container-fluid my-5">
        <div class="title-dokumentasi" data-aos= "fade-up" data-aos-duration="1000">
          <h2 class="text-center fw-bold mb-3">Galeri<span> Masjid</span></h2>
        </div>
        <div class="row mt-5">
          <div class="owl-carousel owl-theme">
            <?php
              require 'koneksi.php';

              $query = "SELECT * FROM dokumentasi ORDER BY tgl_kegiatan DESC";
              $query_run = mysqli_query($koneksi, $query);
              $check_dokumentasi = mysqli_num_rows($query_run) > 0;

              if ($check_dokumentasi)
              {
                while($row = mysqli_fetch_array($query_run))
                {
              ?>
            <div class="item mb-4">
              <div class="card border-0 shadow" data-aos= "fade-up" data-aos-duration="1000">
                <img src="berkas/dokumentasi/<?php echo $row['images']; ?>">
                <div class="card-body">
                  <h4 class="text-center"><?php echo $row['deskripsi'];?></h4>
                </div>
              </div>
            </div>
            <?php
              }
            } else 
            {
              echo "No Dokumentasi Found";
            }
            ?>

          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Dokumentasi Kegiatan -->

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

    <!-- Lets Include CDN -->

    <!-- Jquery CDN -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>

    <!-- 1. Owl Carousel min.js-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
      integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>

    <!-- Init -->
    <script>
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 2,
          },
          1000: {
            items: 3,
          },
        },
      });
    </script>
  </body>
</html>