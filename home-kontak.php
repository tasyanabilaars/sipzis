<!DOCTYPE html>
<html lang="id">
  <?php include ('includes/head.php')?>
  <body>
    <!-- Navbar -->
    <?php include ('includes/navbar.php')?>
    <!-- End Navbar -->

    
    <!-- Wave Effect -->
    <section class="jumbotron">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L26.7,64C53.3,96,107,160,160,208C213.3,256,267,288,320,277.3C373.3,267,427,213,480,202.7C533.3,192,587,224,640,218.7C693.3,213,747,171,800,138.7C853.3,107,907,85,960,90.7C1013.3,96,1067,128,1120,149.3C1173.3,171,1227,181,1280,165.3C1333.3,149,1387,107,1413,85.3L1440,64L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg>
    </section>
    <!-- End Wave Effect -->

    <!-- Form Section -->
    <section class="form-content" id="form-content">
      <div class="container">
        <div class="section-title">
          <h3>KRITIK DAN SARAN</h3>
        </div>
        <div class="row">
          <div class="col-lg-5 d-flex align-items-strecth">
            <div class="info">
              <div class="address">
                <i class="bx bxs-map"></i>
                <h6>Lokasi :</h6>
                <p>Perum Mutiara Bekasi Jaya Blok D, Sindangmulya, Kec. Cibarusah, Kabupaten Bekasi</p>
              </div>

              <!-- Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.818770411476!2d107.09455861449507!3d-6.417327364544241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6997814826c42f%3A0xc803c71bb77f475f!2sMasjid%20Al-Hidayah!5e0!3m2!1sid!2sid!4v1676642900924!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px; padding-left:3.5rem;" allowfullscreen></iframe>
              <!-- End Map -->
            </div>
          </div>

          <!-- Formulir Kritik dan Saran -->
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="form-formulir">
              <form action="act-kontak.php" method="POST">
                <div class="row">
                  <div class="form-group col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_pengirim" placeholder="Masukkan Nama Anda" required />
                  </div>
                  <div class="form-group col-md-6 mb-3">
                    <label for="topik_kritik" class="form-label">Topik</label>
                    <input type="text" class="form-control" name="topik" placeholder="Masukkan Topik Kritik" required />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 mb-3">
                    <label for="deskripsi" class="form-label">Isi Pesan</label>
                    <textarea class="form-control" name="deskripsi_kritik" rows="10" placeholder="Tuliskan pesan disini" required></textarea>
                  </div>
                  <div class="text-center">
                    <center><button type="submit" class="btn btn-primary" name="kirim">Kirim</button></center>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- End Formulir Kritik dan Saran -->
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
