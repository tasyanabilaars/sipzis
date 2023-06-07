<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li>
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="uil uil-bars"></i></a>
      </li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/user.png" class="rounded-circle mr-1" />
          <div class="d-sm-none d-lg-inline-block">Hai, Bapak <?= $username; ?></div>
      </a>
      
      <div class="dropdown-menu dropdown-menu-right">
        <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="uil uil-sign-out-alt"></i>Keluar</a>
      </div>
    </li>
  </ul>
</nav>