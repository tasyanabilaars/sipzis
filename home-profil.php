<!doctype html>
<html lang="id">
  <?php include('includes/head.php') ?>
  <body>
    <!-- Navbar -->
    <?php include('includes/navbar.php') ?>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section class="banner-kerjasama">
      <div class="banner-carve-kerjasama">
        <div class="overlay-kerjasama">
          <h1>STRUKTUR KEPENGURUSAN DKM MASJID AL - HIDAYAH</h1>
          <br>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->

    <section>
      <div class="section-title text-center" data-aos= "fade-up" data-aos-duration="1000">
        <h3>STRUKTUR PENGURUS <br>
          DKM MASJID AL - HIDAYAH</h3>
      </div>
      <div class="container"  data-aos= "fade-up" data-aos-duration="1000">
        <div class="row mt-4">
          <?php
          require 'koneksi.php';

          $query = "SELECT * FROM pengurus";
          $query_run = mysqli_query($koneksi, $query);
          $check_pengurus = mysqli_num_rows($query_run) > 0;

          if ($check_pengurus)
          {
            while($row = mysqli_fetch_array($query_run))
            {
              ?>
                <center><img class="img-fluid" src="berkas/pengurus/<?php echo $row['foto']; ?>" width="100%" height="800px"></center>
              <?php
            }
          } else 
          {
            echo "No Pengurus Found";
          }
          ?>
        </div>
      </div>
    </section>
      
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