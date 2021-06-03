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
    <link rel="stylesheet" href="../assets_warga/css/styles.css" />

    <!-- ===== font google ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Monda&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    

    <title>PENTAGA</title>
  </head>
  <body id="body-pd" >
    <header class="header" id="header">
      <div class="header__toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
      <div class="header_Judul">
        <h1>PENTAGA</h1>
      </div>

      <div class="header__img">
          <div class="dropdown">
            <i class="bi bi-person-square"></i>
            <div class="dropdown-content">
            <span class="namauser">{{ Auth::user()->nama }}</span>
            <i class="ti-angle-down"></i>
            </div>
          </div>
      </div>

    </header>

    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="{{ url('/warga/home') }}" class="nav__logo">
            <img src="../assets/img/logo.png" alt="" />
          </a>

          <div class="nav__list">
            <a href="{{ url('/warga/home') }}" class="nav__link active">
              <i class="bi bi-house nav__icon"></i>
              <span class="nav__name">Home</span>
            </a>

            <a href="{{ url('/warga/create') }}" class="nav__link ">
              <i class="bi bi-file-earmark-plus nav__icon"></i>
              <span class="nav__name">Isi Data Diri</span>
            </a>

            <a href="{{ url('/warga/data_diri') }}" class="nav__link">
              <i class="bi bi-file-earmark-text nav__icon"></i>
              <span class="nav__name">Data Diri</span>
            </a>

            <a href="{{ url('/warga/notifikasi') }}" class="nav__link">
              <i class="bi bi-bell nav__icon"></i>
              <span class="nav__name">Notifikasi</span>
            </a>
          </div>
          
        </div>

        <a type="submit" href="{{ url('/warga/logout') }}"  class="nav__link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="bx bx-log-out nav__icon"></i>
          <span class="nav__name">Keluar</span>
        </a>
        <form action="{{ url('/warga/logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
      </nav>
    </div>

    <!-- CARD JUMLAH DATA WARGA MISKIN DAN KAYA -->

    @foreach($miskin as $data)
    <div class="card-text ">
      <div class="card-body-miskin">
        <div class="card-body-icon-miskin">
          <i class=" pull-left bi bi-people-fill ml-3"></i></div>
        <h5 class="fs-4 card-title p-2 ">Jumlah warga miskin</h5>
        <p class="display-5 ">{{$data->jumlahmiskin}}</p>
      </div>
    </div>
    @endforeach

    @foreach($kaya as $data)
    <div class="card-text ">
      <div class="container">
      <div class="card-body-kaya">
        <div class="card-body-icon-kaya  ">
          <i class=" pull-left bi bi-people-fill ml-3"></i></div>
        <h5 class=" fs-4 card-title p-2 ">Jumlah warga kaya</h5>
        <p class=" display-5 ">{{$data->jumlahkaya}}</p>
      </div>
    </div>
    @endforeach

    <section Id="about">
      <div class="container ">
        <div class="row gy-5 text-right">
          <div class="col-4-sm-9  ">
            <h2>TENTANG PENTAGA</h2><br>
            <p class="fs-4">Pentaga merupakan singkatan dari penggolongaan data warga, aplikasi berfungsi untuk menggolongkan warga desa yang membutuhkan supaya mendapatkan bantuan merata dan pasti</p>
          </div>
        </div>
      </div>

      <div class="container1 ">
        <div class="row gy-5 text-right">
          <div class="col-4-sm-9  ">
            <h3>PANDUAN PENTAGA</h3><br>
            <ol>
                <li>Masuk ke dalam akun PENTAGA dengan username Anda</li>
                <li>Isi data diri pada ikon yang tertera agar keluarga Anda terdaftar sepenuhnya pada PENTAGA, <u> <i>isi data diri cukup sekali</i></u> </li>
                <li>Setelah mengisi data diri, Anda dapat melihat data diri keluarga beserta status penggolongan data warga pada ikon data diri</li>
                <li>Pada ikon notifikasi, Anda akan mendapat info terkait pengumuman bantuan</li>
            </ol>
            
          </div>
        </div>
      </div>

    </section> 
  
    <!--===== MAIN JS =====-->
    <script src="../assets_warga/js/main.js"></script>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

   
    
    @include('sweetalert::alert')
  </body>
</html>
