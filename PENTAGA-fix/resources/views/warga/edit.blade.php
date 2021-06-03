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
    <link rel="stylesheet" href="../../assets_warga/css/styles.css" />

    <!-- ===== font google ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet" />

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
          <a href="{{ url('/warga') }}" class="nav__logo">
            <img src="../../assets/img/logo.png" alt="" />
          </a>

          <div class="nav__list">
            <a href="{{ url('/warga/home') }}" class="nav__link">
              <i class="bi bi-house nav__icon"></i>
              <span class="nav__name">Home</span>
            </a>

            <a href="{{ url('/warga/create') }}" class="nav__link active ">
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

    <section >
    <h3 style="text-align: center; font-family: 'Nunito', sans-serif; font-weight:bold;">Form Isi Ubah Data Diri Warga</h3>
    <br>
    <h6 style="color:#7E1818;"> Harap mengisikan data diri sesuai dengan instruksi di bawah ini!</h6>
    <div class="col-11"  >
    <form action="/warga/{{$citizen->id}}/update" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf

      <div class="result">
                <!-- @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif

                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                @endif -->
            
      </div>

        <div class="card-body">
        <div class="row" style="margin-left: 18px;">
              <div class="col-md-6">

              <div class="form-group">
                <label for="nama">Nama :</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Lengkap" 
                  value="{{ $citizen->nama }}" disabled/>
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

	            <div class="form-group">
                <label for="noKK">Nomor Kartu Keluarga :</label>
                  <input type="text" name="noKK" id="noKK" class="form-control @error('noKK') is-invalid @enderror" placeholder="Masukan Nomor Kartu Keluarga" 
                  value="{{ $citizen->noKK }}" disabled/>
                  @error('noKK')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

	            <div class="form-group">
	              <label for="tempatLahir">Tempat Lahir :</label>
	                <input type="text" name="tempatLahir" id="tempatLahir" class="form-control @error('tempatLahir') is-invalid @enderror" placeholder="Masukan Tempat Lahir" 
                    value="{{ $citizen->tempatLahir }}" disabled/>
                  @error('tempatLahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
	            </div> 

	            <div class="form-group">
                <label for="tanggalLahir">Tanggal Lahir :</label>
                <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control @error('tanggalLahir') is-invalid @enderror" placeholder="Masukan Tanggal Lahir" 
                value="{{ $citizen->tanggalLahir }}" disabled/>
                @error('tanggalLahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="dusun">Dusun :</label>
                <input type="text" name="dusun" id="dusun" class="form-control @error('dusun') is-invalid @enderror" placeholder="Masukan Nama Dusun" 
                value="{{ $citizen->dusun }}"/>
                @error('dusun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="lorong">Lorong :</label>
                <input type="text" name="lorong" id="lorong" class="form-control @error('lorong') is-invalid @enderror" placeholder="Masukan Nama Lorong" 
                value="{{ $citizen->lorong }}"/>
                @error('lorong')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="noRumah">Nomor Rumah :</label>
                  <input type="text" name="noRumah" id="noRumah" class="form-control @error('noRumah') is-invalid @enderror" placeholder="Masukan Nomor Rumah" 
                  value="{{ $citizen->noRumah }}"/>
                  @error('noRumah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="luasPetakRumah">Luas Petak Rumah :</label>
                  <input type="text" name="luasPetakRumah" id="luasPetakRumah" class="form-control @error('luasPetakRumah') is-invalid @enderror" placeholder="Masukan luas petak rumah dalam satuan m2"
                  value="{{ $citizen->luasPetakRumah }}"/>
                  @error('luasPetakRumah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="jumlahTanggungan">Jumlah Tanggungan :</label>
                <input type="number" name="jumlahTanggungan" id="jumlahTanggungan" class="form-control @error('jumlahTanggungan') is-invalid @enderror" placeholder="Masukkan Jumlah Tanggungan" 
                value="{{ $citizen->jumlahTanggungan }}"/>
                @error('jumlahTanggungan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="jumlahKendaraan">Jumlah Kendaraan :</label>
                <input type="number" name="jumlahKendaraan" id="jumlahKendaraan" class="form-control @error('jumlahKendaraan') is-invalid @enderror" placeholder="Masukkan Jumlah Kendaraan" 
                value="{{ $citizen->jumlahKendaraan }}"/>
                @error('jumlahKendaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
        </div>


      <div class="col-md-6">
         <div class="form-group">
              <label for="penghasilan">Penghasilan :</label>
              <input type="number" name="penghasilan" id="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror" placeholder="Masukkan Penghasilan"
              value="{{ $citizen->penghasilan }}" />
              @error('penghasilan')
                    <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

	      <div class="form-group">
            <label for="noHP">No HP :</label>
            <input type="text" name="noHP" id="noHp" class="form-control @error('noHP') is-invalid @enderror" placeholder="Masukan No HP"  
            value="{{ $citizen->noHP }}"/>
                @error('noHP')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group">
              <label for="profesi">Profesi :</label>
              <input type="text" name="profesi" id="profesi" class="form-control @error('profesi') is-invalid @enderror" placeholder="Masukan Nama Profesi"
              value="{{ $citizen->profesi }}"/>
                @error('profesi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>

          <div class="form-group">
              <label for="kepemilikanRumah">Kepemilikan Rumah :</label>
              <select name="kepemilikanRumah" class="form-control form-select form-select-sm @error('kepemilikanRumah') is-invalid @enderror" 
              value="{{ $citizen->kepemilikanRumah }}">
                    <option disabled value="">Pilih disini</option>
                    <option value="Sendiri" {{ $citizen->kepemilikanRumah == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                    <option value="Sewa" {{ $citizen->kepemilikanRumah == "Sewa" ? 'selected' : '' }}>Sewa</option>

                  @error('kepemilikanRumah')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </select>
          </div>

          <div class="form-group">
              <label for="penahMenerimaBantuan">Pernah Menerima Bantuan (?) :</label >
              <select name="pernahMenerimaBantuan" class="form-control form-select form-select-sm @error('pernahMenerimaBantuan') is-invalid @enderror"
              value="{{ $citizen->pernahMenerimaBantuan }}" disabled>
                    <option disabled value="">Pilih disini</option>
                    <option value="Ya" {{ $citizen->pernahMenerimaBantuan == "Ya" ? 'selected' : '' }}>Ya</option>
                    <option value="Tidak" {{ $citizen->pernahMenerimaBantuan == "Tidak" ? 'selected' : '' }}>Tidak</option>
                        
                  @error('pernahMenerimaBantuan')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
              </select>
          </div>

          <div class="form-group">
              <label for="tagihanListrikPerbulan">Tagihan Listrik Perbulan :</label>
                <select name="tagihanListrikPerbulan" class="form-control form-select form-select-sm @error('tagihanListrikPerbulan') is-invalid @enderror"  >
                <option value="" disabled>Pilih disini</option>
                        <option value="Rp.50.000,00 - Rp.200.000,00" {{ $citizen->tagihanListrikPerbulan == "Rp.50.000,00 - Rp.200.000,00" ? 'selected' : '' }}>Rp.50.000,00 - Rp.200.000,00</option>
                        <option value="Rp.200.000,00 - Rp.400.000,00" {{ $citizen->tagihanListrikPerbulan == "Rp.200.000,00 - Rp.400.000,00" ? 'selected' : '' }}>Rp.200.000,00 - Rp.400.000,00</option>
                        <option value=">Rp.500.000,00" {{ $citizen->tagihanListrikPerbulan == ">Rp.500.000,00" ? 'selected' : '' }}>>Rp.500.000,00</option>
                  @error('tagihanListrik')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </select>
                <label for="tagihanListrikPerbulanBukti" class="form-control">Uplouded File: ({{ $citizen->tagihanListrikPerbulanBukti }})</label>
                <input type="file" name="tagihanListrikPerbulanBukti" class="form-control @error('tagihanListrikPerbulanBukti') is-invalid @enderror"  
                value="{{ $citizen->tagihanListrikPerbulanBukti }}" />
                @error('tagihanListrikPerbulanBukti')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
          </div>

          <div class="form-group">
              <label for="tagihanAirPerbulan">Tagihan Air Perbulan (jika ada) :</label>
                <select name="tagihanAirPerbulan" id="tagihanAirPerbulan" class="form-control form-select form-select-sm @error('tagihanAirPerbulan') is-invalid @enderror"
                value="{{ $citizen->tagihanAirPerbulan }}">
                    <option value="" disabled>Pilih disini</option>
                    <option value="Rp.50.000,00 - Rp.200.000,00" {{ $citizen->tagihanAirPerbulan == "Rp.50.000,00 - Rp.200.000,00" ? 'selected' : '' }}>Rp.50.000,00 - Rp.200.000,00</option>
                    <option value="Rp.200.000,00 - Rp.400.000,00" {{ $citizen->tagihanAirPerbulan == "Rp.200.000,00 - Rp.400.000,00" ? 'selected' : '' }}>Rp.200.000,00 - Rp.400.000,00</option>
                    <option value=">Rp.500.000,00" {{ $citizen->tagihanAirPerbulan == ">Rp.500.000,00" ? 'selected' : '' }}>>Rp.500.000,00</option>
                </select>
                @error('tagihanAirPerbulan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="tagihanAirPerbulanBukti" class="form-control">Uplouded File: ({{ $citizen->tagihanAirPerbulanBukti }})</label>
                <input type="file" name="tagihanAirPerbulanBukti" id="tagihanAirBuktiPerbulan" class="form-control @error('tagihanAirPerbulanBukti') is-invalid @enderror " 
                value="{{ $citizen->tagihanAirPerbulanBukti }}"/>
                @error('tagihanAirPerbulanBukti')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
          </div>

          <div class="form-group">
              <label for="konstruksiRumah">Konstruksi Rumah :</label>
                <select name="konstruksiRumah" id="konstruksiRumah" class="form-control form-select form-select-sm @error('konstruksiRumah') is-invalid @enderror" 
                value="{{ $citizen->konstruksiRumah }}">
                  <option value="" disabled>Pilih disini</option>
                    <option value="Permanen" {{ $citizen->konstruksiRumah == "Permanen" ? 'selected' : '' }}>Permanen</option>
                    <option value="Semi-Permanen" {{ $citizen->konstruksiRumah == "Semi-Permanen" ? 'selected' : '' }}>Semi-Permanen</option>
                    <option value="Non-Permanen" {{ $citizen->konstruksiRumah == "Non-Permanen" ? 'selected' : '' }}>Non-Permanen</option>
                  @error('konstruksiRumah')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </select>
                
                <label for="konstruksiRumahBukti" class="form-control">Uplouded File: ({{ $citizen->konstruksiRumahBukti }})</label>
                <input type="file" name="konstruksiRumahBukti" id="konstruksiRumahBukti" class="form-control @error('konstruksiRumahBukti') is-invalid @enderror" 
                value="{{ $citizen->konstruksiRumahBukti }}"/>
                @error('konstruksiRumahBukti')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
          </div>

          <div class="form-group">
              <!-- <label for="golongan">Golongan :</label > -->
              <input type="hidden" name="golongan" id="golongan" value="belum diverifikasi" >
          </div>

              </div>

                <!-- /.card-body -->
                <div class="card-footer" >
                  <button type="submit" class="btn btn-primary btn-lg" style="float: right;">Simpan Perubahan</button>
                </div>
  </form>
    </section> 

    <!--===== MAIN JS =====-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="../../assets/js/main.js"></script>
    @include('sweetalert::alert')
  </body>
</html>