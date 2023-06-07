<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="id">
  <?php include('include/head.php'); ?>
  <title>Masuk Admin | SIPZIS</title>
  <body>
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <div class="login-brand">
                <img src="../assets/img/alhidayah.jpg" alt="logo" width="100" height="100" class="shadow-light rounded-circle" />
              </div>

              <div class="card card-success">
                <div class="card-header">
                  <h4 class="text-center">SIPZIS</h4>
                </div>

                <div class="card-body">
                  <form method="POST" action="../act-login.php" class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label for="username">Nama Pengguna</label>
                      <input id="text" type="text" name="username" class="form-control" tabindex="1" required autofocus />
                      <div class="invalid-feedback">Silahkan isi nama pengguna Anda</div>
                    </div>

                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Kata Sandi</label>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" tabindex="2" required />
                      <div class="invalid-feedback">Silahkan isi kata sandi Anda</div>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" tabindex="4">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="simple-footer">Copyright &copy; SIPZIS 2023</div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
