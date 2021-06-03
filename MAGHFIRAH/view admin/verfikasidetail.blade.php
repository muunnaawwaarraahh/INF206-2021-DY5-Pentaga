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
        <h1>PENTAGA</h1>
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
            <a href="{{ url('/admin/home') }}" class="nav__link ">
              <i class="bi bi-house-door nav__icon"></i>
              <span class="nav__name">Home</span>
            </a>

            <a href="{{ url('/admin/verifikasi') }}" class="nav__link active">
              <i class="bi bi-file-earmark-bar-graph nav__icon"></i>
              <span class="nav__name">Verifikasi Golongan</span>
            </a>

            <a href="{{ url('/admin/terdaftar') }}" class="nav__link  ">
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

    <div class="detaildata">
    <h2> DETAIL DATA</h2>
    </div>
    <section >

    <div class="row gutters-sm">
            
    <div class="col-md-11">

<div class="card mb-3">
  <div class="card-body">

    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Nama </h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen-> nama }}
      </div>
    </div>

    <hr>
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Nomor Kartu Keluarga </h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen-> noKK }}
      </div>
    </div>
    <hr>
   
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Tempat Lahir</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen-> tempatLahir }}
      </div>
    </div>

    <hr>
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Tanggal Lahir</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen-> tanggalLahir }}
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Dusun</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->dusun  }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Lorong</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->lorong }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Nomor Rumah</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->noRumah  }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Luas Petak Rumah</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->luasPetakRumah }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Jumlah Tanggungan</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->jumlahTanggungan }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Jumlah Kendaraan</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->jumlahKendaraan }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Penghasilan</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->penghasilan }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">No HP</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->noHP }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Profesi</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->profesi }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Kepemilikan Rumah</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->kepemilikanRumah }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Pernah Menerima Bantuan (?)</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->pernahMenerimaBantuan }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Tagihan Listrik Perbulan</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->tagihanListrikPerbulan }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Bukti Tagihan Listrik</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      <img class="fotorumah" src="../image_listrik/{{ $citizen->tagihanListrikPerbulanBukti }}" alt="">
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Tagihan Air Perbulan</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->tagihanAirPerbulan }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Bukti Tagihan Air</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      <img class="" src="../../image_air/{{ $citizen->tagihanAirPerbulanBukti }}" alt="">
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Konstruksi Rumah</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->konstruksiRumah }}
      </div>
    </div>
    <hr>
    
    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Bukti Konstruksi Rumah</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      <img class="fotorumah" src="../image_rumah/{{ $citizen->konstruksiRumahBukti }}" alt="">
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-sm-3">
        <h6 class="mb-0">Golongan</h6>
      </div>
      <div class="col-sm-1">
        <h6 class="mb-0">:</h6>
      </div>
      <div class="col-sm-8 text-dark">
      {{ $citizen->golongan }}
      </div>
    </div>
    <div style="float: right; font-size:2rem;">
                    <a href="{{ url('/admin/verifikasi') }}" class="btn btn-secondary btn-lg">Kembali</a>
                    <a type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target=" #exampleModal-{{ $citizen->id }} ">
                        Verifikasi Golongan
                    </a>
    </div>
  
</div>

</div>

    </div>

<!-- bagian popup -->    
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $citizen->id }}" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pilih Golongan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/admin/{{$citizen->id}}">
                      @method('patch')
                      @csrf
                      @if (session('flash_message_success'))
                        <div class="alert alert-success mt-5"></div>
                      @endif

                      <br>
                      <div>
                        <div class="form-group" >
                              <select name="golongan" id="golongan" class="form-control form-select form-select-sm @error('golongan') is-invalid @enderror" style="font-size: 1.3rem;" required>
                                <option value="belum diverifikasi" selected disabled >- Pilih disini -</option>
                                <option value="Miskin">Miskin</option>
                                <option value="Kaya">Kaya</option>
                                @error('golongan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </select>
                              
                        </div>
                      <br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

    <!--===== MAIN JS =====-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="../assets/js/main.js"></script>
    @include('sweetalert::alert')
  </body>

</html>