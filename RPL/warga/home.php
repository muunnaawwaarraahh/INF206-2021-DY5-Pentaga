<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!-- ===== BOX and bootstrap ICONS ===== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css" />

    <!-- ===== font google ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet" />

    <title>Home</title>
  </head>
  <body id="body-pd">
    <header class="header" id="header">
      <div class="header__toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
      <div class="header_Judul">
        <h1>PENTAGA</h1>
      </div>

      <div class="header__img">
        <i class="bi bi-person-x fa-2x"></i>
      </div>
    </header>

    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="#" class="nav__logo">
            <img src="assets/img/logo.png" alt="" />
          </a>

          <div class="nav__list">
            <a href="/RPL/warga/home.php" class="nav__link active">
              <i class="bi bi-house"></i>
              <span class="nav__name">Home</span>
            </a>

            <a href="/RPL/warga/image/isi_data_diri.php" class="nav__link ">
              <i class="bi bi-file-earmark-plus"></i>
              <span class="nav__name">Isi Data Diri</span>
            </a>

            <a href="/RPL/warga/data_diri.php" class="nav__link">
              <i class="bi bi-file-earmark-text"></i>
              <span class="nav__name">Data Diri</span>
            </a>

            <a href="/RPL/warga/notifikasi.php" class="nav__link">
              <i class="bi bi-bell"></i>
              <span class="nav__name">Notifikasi</span>
            </a>
          </div>
        </div>

        <a href="../login_register/login.php" class="nav__link">
          <i class="bx bx-log-out nav__icon"></i>
          <span class="nav__name">Keluar</span>
        </a>
      </nav>
    </div>

    <!-- <section Id="about">
      <div class="container ">
        <div class="row gy-5 text-right">
          <div class="col-4-sm-9  ">
            <h1><i class="bi bi-info-lg"></i>TENTANG PENTAGA</h1><br>
            <p class="fs-4">PENTAGA MERUPAKAN SINGKATAN DARI PENGGOLONGAAN DATA WARAGA,APLIKASI BERFUNGSI UNTUK MENGGOLONGKAN WARGA DESA YANG MEMBUTUHKAN SUPAYA MENDAPATKAN BANTUAN MERATA DAN PASTI</p>
          </div>
        </div>
  
          </div>
        </div>
      </div>
    </section> 
    -->

    <!--===== MAIN JS =====-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
