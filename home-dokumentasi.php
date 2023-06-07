<!doctype html>
<html lang="id">
  <?php include ('includes/head.php')?>
  <body>

    <!-- Navbar -->
    <?php include ('includes/navbar.php')?>
    <!-- End Navbar -->


    <!-- Hero Section -->
    <section class="banner-kerjasama">
      <div class="banner-carve-kerjasama">
        <div class="overlay-kerjasama">
          <h1>DOKUMENTASI KEGIATAN MASJID AL - HIDAYAH</h1>
          <br>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->

    <!-- Carousel Dokumentasi Kegiatan -->
    <section>
      <div class="section-title text-center" data-aos= "fade-up" data-aos-duration="1000">
        <h3>Dokumentasi<span>
          Kegiatan</span></h3>
      </div>
      <div class="container-fluid my-5">
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
              <div class="card border-0 shadow">
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