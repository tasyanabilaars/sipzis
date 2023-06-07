<?php 

  include 'koneksi.php';
  $query = "SELECT * FROM zakatfitrah";
  $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
  <?php include 'includes/head.php';?>
  <body>
    <!-- Navbar -->
    <?php include 'includes/navbar.php';?>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section class="banner-zakat">
      <div class="banner-carve-zakat">
        <div class="overlay-zakat">
          <h1>وَاَقِيْمُوا الصَّلٰوةَ وَاٰتُوا الزَّكٰوةَ وَارْكَعُوْا مَعَ الرّٰكِعِيْنَ</h1>
          <br>
          <p>Tegakkanlah salat, tunaikanlah zakat, dan rukuklah beserta orang-orang yang rukuk</p>
          <p>- Q.S Al - Baqarah Ayat 43 - </p>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->

    <!-- Form Section -->
    <section class="form-content" id="form-content">
      <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
          <h3>Zakat Fitrah</h3>
          <h5 class="text-primary">Jika Anda berminat menyalurkan Zakat Fitrah, silahkan isi formulir dibawah ini</h5>
        </div>
        <div class="row">
          <div class="col-lg-5 d-flex align-items-strecth">
            <div class="info">
              <div class="address" data-aos="fade-up" data-aos-duration="2000">
                <i class="bx bxs-map"></i>
                <h6>Lokasi :</h6>
                <p class="justify">Perum Mutiara Bekasi Jaya Blok D, Sindangmulya, Kec. Cibarusah, Kabupaten Bekasi</p>
              </div>
              <!-- Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.818770411476!2d107.09455861449507!3d-6.417327364544241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6997814826c42f%3A0xc803c71bb77f475f!2sMasjid%20Al-Hidayah!5e0!3m2!1sid!2sid!4v1676642900924!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px; padding-left:3.5rem;" allowfullscreen>
                  
              </iframe>
              <!-- End Map -->
            </div>
          </div>
          <!-- Formulir Zakat  -->
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-duration="2000">
            <div class="form-formulir">
              <form action="act-zakat.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-6 mb-3">
                    <label for="nama_donatur" class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" class="form-control" name="nama_donatur" required placeholder="Nama Kepala Keluarga" />
                  </div>
                  <div class="form-group col-md-6 mb-3">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" name="no_hp" required placeholder="Masukkan No. WA/Aktif" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" required />
                  </div>
                  <input type="hidden" class="form-control" name="jenis_donasi" value="zakat_uang">
                  <div class="form-group col-md-6 mb-3">
                    <label for="nilai_zakat" class="form-label">Nilai Zakat</label>
                    <select class="form-select" name="nilai_zakat" required>
                      <option selected disabled>-- Nilai Zakat --</option>
                      <option value="35000" id="nilai_1" onkeyup="sum();">35000/jiwa</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6 mb-3">
                    <label for="jml_tanggungan" class="form-label">Jumlah Tanggungan</label>
                    <input type="text" class="form-control" name="jumlah_tanggungan" placeholder="Contoh : 5" id="nilai_2" onkeyup="sum();" required />
                  </div>
                  <div class="form-group col-md-6 mb-3">
                    <label for="total" class="form-label">Total yang harus dibayar</label>
                    <input type="text" class="form-control" name="total" id="total" readonly="readonly" required />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 mb-3">
                    <label for="bukti_donasi" class="form-label">Bukti Donasi
                    </label>
                    <input class="form-control" type="file" name="bukti_donasi" required />
                  </div>
                </div>
                <div class="text-center">
                  <center><button type="submit" class="btn btn-primary" name="kirim">Kirim</button></center>
                </div>
              </form>
            </div>
          </div>

          <!-- End Formulir Zakat -->
        </div>
      </div>
    </section>
    <!-- End Form Section -->
    
    <section class="data-zakat">
        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="3000">
          <h3>Laporan Pembayaran<span> Zakat Fitrah</span></h3>
        </div>
  
        <form method="GET" class="data ml-5" data-aos="fade-up" data-aos-duration="3000">
          <div class="row">
            <div class="form-group mr-3 d-flex justify-content-center">
                <input type="date" class="form-control" name="tglawal" id="tglawal" value="<?php echo @$GET['tglawal'];?>">
              <button class="btn-data btn-primary btn-lg ml-5" name="tampil">Tampil</button>
              <?php
              if(isset($_GET['tampil'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                  echo '<a href="donasi-zakat.php" class="btn-data btn-lg btn-success">Hapus</a>';
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
                            </tr>
                            <?php
                                $batas = 100;
                                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                          
                                $previous = $halaman - 1;
                                $next = $halaman + 1;
                        
                                $data = mysqli_query($koneksi, "SELECT * FROM donasi WHERE jenis_donasi='zakat_uang'");
                                $total = 0;
                                $no=1;
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);
                        
                                if(isset($_GET['tglawal'])) {
                                    $tglawal = $_GET['tglawal'];
                                    $tampil = mysqli_query($koneksi,"SELECT * FROM donasi,zakatfitrah WHERE donasi.id_donasi=zakatfitrah.id_donasi AND tgl_donasi='$tglawal' AND status IN (2) AND jenis_donasi='zakat_uang' ORDER BY id_zakat DESC ");
                                } else {
                                    $tampil = mysqli_query($koneksi,"SELECT * FROM donasi,zakatfitrah WHERE donasi.id_donasi=zakatfitrah.id_donasi AND tgl_donasi='$tglawal' AND jenis_donasi='zakat_uang' AND status IN (2) ORDER BY tgl_donasi DESC LIMIT $halaman_awal,$batas");
                                } 
                                while ($row=mysqli_fetch_array($tampil)) {
                            ?>
                            <tr class="row-text">
                              <td><?= $no++; ?></td>
                              <td><?= date('d-m-Y', strtotime($row['tgl_donasi']));?></td>
                              <td><?= $row["nama_donatur"]; ?></td>
                              <td><?= $row["jumlah_tanggungan"]; ?></td>
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
    
    <!-- Datepicker Indonesia-->
    <script>
        $(function(){
           $("#tglawal").datepicker({
               dateFormat : "dd/mm/YY",
               dateMonth : true,
               dateYear : true
           }); 
        });
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

  <script>
    function sum() {
      var txtFirstNumberValue = document.getElementById('nilai_1').value;
      var txtSecondNumberValue = document.getElementById('nilai_2').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
          document.getElementById('total').value = result;
        }
    }
  </script>
    
  </body>
</html>