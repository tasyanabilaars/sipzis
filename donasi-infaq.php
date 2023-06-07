<!DOCTYPE html>
<html lang="id">
  <?php include ('includes/head.php')?>

  <body>
    <!-- Navbar -->
    <?php include ('includes/navbar.php')?>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section class="banner">
      <div class="banner-carve">
        <div class="overlay">
          <h1>يَٰٓأَيُّهَا ٱلَّذِينَ ءَامَنُوٓا۟ أَنفِقُوا۟ مِن طَيِّبَٰتِ مَا كَسَبْتُمْ وَمِمَّآ أَخْرَجْنَا لَكُم مِّنَ ٱلْأَرْضِ</h1>
          <p> Wahai orang-orang yang beriman, infakkanlah sebagian dari hasil usahamu yang baik-baik dan sebagian dari apa yang Kami keluarkan dari bumi untukmu.</p>
          <p>- Q.S Al - Baqarah Ayat 267 - </p>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->
    
    <!-- Form Section -->
    <section class="form-content" id="form-content">
      <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
          <h3>INFAQ</h3>
          <h5 class="text-primary">Donasi Infaq ini hanya diperuntukkan untuk Jamaah Masjid Al - Hidayah RW 007 Perum Mutiara Bekasi Jaya</h5>
          <p>Jika Anda masyarakat diluar RW 007 bisa berdonasi dengan memilih opsi sedekah pada menu donasi</p>
        </div>
        <div class="row">
          <div class="col-lg-6 d-flex align-items-strecth" data-aos="fade-up" data-aos-duration="2000">
            <div class="info">
              <div class="address" data-aos="fade-up" data-aos-duration="2000">
                <i class="bx bxs-map"></i>
                <h6>Lokasi :</h6>
                <p class="justify">Perum Mutiara Bekasi Jaya Blok D, Sindangmulya, Kec. Cibarusah, Kabupaten Bekasi</p>
              </div>

              <!-- Map -->
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.818770411476!2d107.09455861449507!3d-6.417327364544241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6997814826c42f%3A0xc803c71bb77f475f!2sMasjid%20Al-Hidayah!5e0!3m2!1sid!2sid!4v1676642900924!5m2!1sid!2sid"
                frameborder="0"
                style="border: 0; width: 100%; height: 290px; padding-left: 3.5rem"
                allowfullscreen
              ></iframe>
              <!-- End Map -->
            </div>
          </div>

          <!-- Form Registrasi -->
          <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-duration="2000">
            <div class="form-formulir">
              <div class="wrapper">
                <div class="title-text">
                  <div class="title login">Masuk</div>
                  <div class="title signup">Daftar</div>
                </div>
                <div class="form-container">
                  <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked />
                    <input type="radio" name="slide" id="signup" />
                    <label for="login" class="slide login">Masuk</label>
                    <label for="signup" class="slide signup">Daftar</label>
                    <div class="slider-tab"></div>
                  </div>
                  <div class="form-inner">
                    <form action="act-login.php" class="login" method="POST">
                      <pre></pre>
                      <div class="field">
                        <input type="text" placeholder="Masukkan Nama Kepala Keluarga" name="username" required />
                      </div>
                      <div class="field">
                        <input type="password" placeholder="Masukkan Kata Sandi" name="password" required />
                        <div class="invalid-feedback">Silahkan isi kata sandi Anda</div>
                      </div>
                      <div class="mt-4">
                    <center><button type="submit" class="btn btn-primary" name="submit">Masuk</button></center>
                      </div>
                      <div class="signup-link">Buat akun <a href="">Daftar sekarang</a></div>
                    </form>

                    <!-- Registrasi -->
                    <form action="act-registrasi.php" class="signup" method="POST">
                      <div class="field">
                        <input type="text" placeholder="Masukkan Nama Kepala Keluarga" name="username" required />
                      </div>
                      <div class="field">
                        <input type="text" placeholder="Masukkan Kata Sandi" name="password" required />
                        
                      </div>
                      <div class="field">
                        <input type="text" placeholder="Masukkan No.Handphone/WA" name="no_hp" required />
                      </div>
                      <div class="field">
                        <input type="text" placeholder="Masukkan Alamat Lengkap" name="alamat" required />
                      </div>
                      <div class="mt-4">
                    <center><button type="submit" class="btn btn-primary" name="daftar">Daftar</button></center>
                      </div>
                      <div class="signup-link">Sudah punya akun? <a href="">Masuk</a></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Form Infaq -->
        </div>
      </div>
    </section>
    <!-- End Form Section -->

    <!-- Footer -->
    <?php include ('includes/footer.php')?>
    <!-- End Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Aos Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- Login Animation -->
    <script src="assets/js/login.js"></script>


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
