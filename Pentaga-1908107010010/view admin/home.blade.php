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
    <link rel="stylesheet" href="../assets/css/styles.css" />


    <!-- ===== font google ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet" />

    <title>PENTAGA</title>
  </head>
  <body id="body-pd">
  <div class="nampak">
    <header class="header" id="header">
      <div class="header__toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
      <div class="header_Judul">
        <h1 >PENTAGA</h1>
      </div>

      <div class="header__img">
          <div class="dropdown">
            <i class="bi bi-person-square"></i>
            <div class="dropdown-content">
            <span class="namauser">{{ Auth::guard('admin')->user()->username }}</span>
            <i class="ti-angle-down"></i>
            </div>
          </div>
      </div>
    </header>

    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="#" class="nav__logo">
            <img src="../assets/img/logo.png" alt="" />
          </a>

          <div class="nav__list">
            <a href="{{ url('/admin/home') }}" class="nav__link active">
              <i class="bi bi-house-door nav__icon"></i>
              <span class="nav__name">Home</span>
            </a>

            <a href="{{ url('/admin/verifikasi') }}" class="nav__link ">
              <i class="bi bi-file-earmark-bar-graph nav__icon"></i>
              <span class="nav__name">Verifikasi Golongan</span>
            </a>

            <a href="{{ url('/admin/terdaftar') }}" class="nav__link">
              <i class="bi bi-person-lines-fill nav__icon"></i>
              <span class="nav__name">Terdaftar</span>
            </a>

            <a href="{{ url('/admin/pengumuman') }}" class="nav__link">
              <i class="bi bi-file-bar-graph nav__icon"></i>
              <span class="nav__name">Buat Pengumuman</span>
            </a>
          </div>
        </div>

        <a type="submit" href="{{ url('/admin/logout') }}"  class="nav__link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="bx bx-log-out nav__icon"></i>
          <span class="nav__name">Keluar</span>
        </a>
        <form action="{{ url('/admin/logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>

      </nav>
    </div>
    </div>

    <!-- ISI KONTEN -->
    <section >

    @foreach($miskin as $data)
    <div class="card-text ">
      <div class="card-body-miskin">
        <div class="card-body-icon-miskin">
          <i class=" pull-left bi bi-people-fill ml-3"></i></div>
        <h5 class="fs-4 card-title p-2 ">Jumlah golongan miskin</h5>
        <p class="display-5 ">{{$data->jumlahmiskin}}</p>
      </div>
    </div>
    @endforeach

    @foreach($kaya as $data)
    <div class="card-text ">
      <div class="card-body-kaya">
        <div class="card-body-icon-kaya  ">
          <i class=" pull-left bi bi-people-fill ml-3"></i></div>
        <h5 class=" fs-4 card-title p-2 ">Jumlah golongan kaya</h5>
        <p class=" display-5 ">{{$data->jumlahkaya}}</p>
      </div>
    </div>
    @endforeach
    
    @foreach($belum as $data)
    <div class="card-text ">
      <div class="card-body-belum">
        <div class="card-body-icon-belum  ">
          <i class=" pull-left bi bi-people-fill ml-3"></i></div>
        <h5 class=" fs-4 card-title p-2 ">Jumlah belum terverifikasi</h5>
        <p class=" display-5 ">{{$data->jumlahbelum}}</p>
      </div>
    </div>
    @endforeach

      <div class="table-warga col-md-12" >
        <h4>Data Penduduk Gampong Dalam Hitungan Per Keluarga</h4>

        <table class="table table-sm table-hover border-dark table-light" style="margin-top: 1em; font-size:1.3em">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kepala Keluarga</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Dusun</th>
                        <th scope="col">Lorong</th>
                        <th scope="col">No Rumah</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Aksi</th>
                    </tr>    
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                    @foreach($citizens as $citizen)
	                      
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td>{{ $citizen-> nama }}  </td>
                            <td> {{ $citizen-> noKK }}  </td>
                            <td> {{ $citizen-> dusun }}  </td>
                            <td> {{ $citizen-> lorong }}  </td>
                            <td> {{ $citizen-> noRumah }}  </td>
                            <td> {{ $citizen-> golongan }} </td>
                            <td class="button_aksi">                               
                                <a href="/admin/delete/{{$citizen->id}}" class="badge bg-danger delete-confirm">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                       
                    </tbody>
                </table>
      </div>      
            
    </section>

    <!--===== MAIN JS =====-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="../assets/js/main.js"></script>
    @include('sweetalert::alert')
  </body>
</html>