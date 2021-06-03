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

            <a href="{{ url('/admin/verifikasi') }}" class="nav__link ">
              <i class="bi bi-file-earmark-bar-graph nav__icon"></i>
              <span class="nav__name">Verifikasi Golongan</span>
            </a>

            <a href="{{ url('/admin/terdaftar') }}" class="nav__link">
              <i class="bi bi-person-lines-fill nav__icon"></i>
              <span class="nav__name">Terdaftar</span>
            </a>

            <a href="{{ url('/admin/pengumuman') }}" class="nav__link  active">
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


    <section >
    <div class="table-pengumuman ">
    <h3 style="text-align: center; font-family: 'Nunito', sans-serif; font-weight:bold;">PORTAL PENGUMUMAN</h3>
    <br>
    <td class="button_aksi">                               
        <a href="/admin/pengumuman/create" class="btn btn-success btn-lg">Unggah Pengumuman</a>
    </td>
        <table class="table table-sm border-dark table-light" style="margin-top: 1em; font-size:1.3em;">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" >Judul</th>
                        <th scope="col">Lampiran</th>
                        <th scope="col">Tanggal diunggah</th>
                        <th scope="col">Tanggal diubah</th>
                        <th scope="col">Aksi</th>
                    </tr>    
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach($pengumuman as $data)
        
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td> {{ $data-> judul }}</td>
                            <td><a href="/admin/pengumuman/download/{{ $data->dokumen }}" > Download  </a> </td>
                            <td>{{ $data-> created_at }}</td>
                            <td>{{ $data-> updated_at }} </td>
                            <td class="button_aksi">                               
                                <a href="/admin/pengumuman/delete/{{$data->id}}" class="badge bg-danger">hapus</a>
                                <a href="/admin/pengumuman/edit/{{$data->id}}" class="badge bg-primary">edit</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                      @endforeach
                       
                    </tbody>
                </table>
    
    </div>

            
  </form>
    </section> 
   
    

    <!--===== MAIN JS =====-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="../assets/js/main.js"></script>
    @include('sweetalert::alert')
  </body>
</html>