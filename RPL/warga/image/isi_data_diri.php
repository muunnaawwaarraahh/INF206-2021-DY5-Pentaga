<?php
require '../../login_register/functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../home.php';
			</script>
		";
	} else {
    echo mysqli_error($conn);
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '../home.php';
			</script>
		";
    
	}


}
?>

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

    <title>Form Isi Data Diri Warga</title>
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
            <a href="/RPL/warga/home.php" class="nav__link ">
              <i class="bi bi-house"></i>
              <span class="nav__name">Home</span>
            </a>

            <a href="/RPL/warga/image/isi_data_diri.php" class="nav__link active">
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

        <a href="../../../login_register/login.php" class="nav__link">
          <i class="bx bx-log-out nav__icon"></i>
          <span class="nav__name">Keluar</span>
        </a>
      </nav>
    </div>

    <section Id="about">
    <h3 style="text-align: center;">Form Isi Data Diri Warga</h3>
    <br>
    <h6 style="color:#7E1818;"> Harap mengisikan data diri sesuai dengan instruksi di bawah ini</h6>
    <div class="col-11"  >
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required/>
              </div>
	            <div class="form-group">
                <label for="noKK">No Kartu Keluarga:</label>
                  <input type="text" name="noKK" id="noKK" class="form-control" placeholder="Masukan No Kartu Keluarga" required/>
              </div>
	            <div class="form-group">
	              <label for="tempatLahir">Tempat Lahir:</label>
	                <input type="text" name="tempatLahir" id="tempatLahir" class="form-control" placeholder="Masukan Tempat Lahir" required/>
	            </div> 
	            <div class="form-group">
                <label for="tanggalLahir">Tanggal Lahir:</label>
                <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control" placeholder="Masukan Tanggal Lahir" required/>
              </div>
              <div class="form-group">
                <label for="dusun">Dusun:</label>
                <input type="text" name="dusun" id="dusun" class="form-control" placeholder="Masukan Nama Dusun" required/>
              </div>
              <div class="form-group">
                <label for="lorong">Lorong:</label>
                <input type="text" name="lorong" id="lorong" class="form-control" placeholder="Masukan Nama Lorong" required/>
              </div>
              <div class="form-group">
                <label for="noRumah">Nomor Rumah:</label>
                  <input type="text" name="noRumah" id="noRumah" class="form-control" placeholder="Masukan Nomor Rumah" required/>
              </div>
              <div class="form-group">
                <label for="luasPetakRumah">Luas Petak Rumah:</label>
                  <input type="text" name="luasPetakRumah" id="luasPetakRumah" class="form-control" placeholder="Masukan luas petak rumah dalam satuan m2" required/>
              </div>
              <div class="form-group">
                <label for="jumlahTanggungan">Jumlah Tanggungan:</label>
                <input type="number" name="jumlahTanggungan" id="jumlahTanggungan" class="form-control" placeholder="Masukkan Jumlah Tanggungan" required />
              </div>
              <div class="form-group">
                <label for="jumlahKendaraan">Jumlah Kendaraan:</label>
                <input type="number" name="jumlahKendaraan" id="jumlahKendaraan" class="form-control" placeholder="Masukkan Jumlah Kendaraan" required />
              </div>

        </div>

      <div class="col-md-6">
         <div class="form-group">
              <label for="penghasilan">Penghasilan:</label>
              <input type="number" name="penghasilan" id="penghasilan" class="form-control" placeholder="Masukkan Penghasilan" required />
          </div>
	      <div class="form-group">
            <label for="noHp">No HP:</label>
            <input type="text" name="noHp" id="noHp" class="form-control" placeholder="Masukan No HP" required />
        </div>
        <div class="form-group">
              <label for="profesi">Profesi:</label>
              <input type="text" name="profesi" id="profesi" class="form-control" placeholder="Masukan Nama Profesi" required/>
        </div>
          <div class="form-group">
              <label for="kepemilikanRumah">Kepemilikan Rumah:</label>
              <select name="kepemilikanRumah" class="form-select form-select-sm" required >
                  <option selected >Pilih disini</option>
                  <option value="Sendiri">Sendiri</option>
                  <option value="Sewa">Sewa</option>
              </select>
          </div>
          <div class="form-group">
              <label for="penahMenerimaBantuan">Pernah Menerima Bantuan (?):</label >
              <select name="pernahMenerimaBantuan" class="form-select form-select-sm" required>
                  <option selected>Pilih disini</option>
                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
              </select>
          </div>
          <div class="form-group">
              <label for="tagihanListrik">Tagihan Listrik Perbulan:</label>
                <select name="tagihanListrik" class="form-select form-select-sm" required >
                  <option selected>Pilih disini</option>
                  <option value="Rp.50.000,00 - Rp.200.000,00">Rp.50.000,00 - Rp.200.000,00</option>
                  <option value="Rp.200.000,00 - Rp.400.000,00">Rp.200.000,00 - Rp.400.000,00</option>
                  <option value=">Rp.500.000,00">>Rp.500.000,00</option>
                </select>
                <input type="file" name="tagihanListrikBukti" class="form-control" />
          </div>
          <div class="form-group">
              <label for="tagihanAir">Tagihan Air Perbulan:</label>
                <select name="tagihanAir" id="tagihanAir" class="form-select form-select-sm" required>
                  <option selected>Pilih disini</option>
                  <option value="Rp.50.000,00 - Rp.200.000,00">Rp.50.000,00 - Rp.200.000,00</option>
                  <option value="Rp.200.000,00 - Rp.400.000,00">Rp.200.000,00 - Rp.400.000,00</option>
                  <option value=">Rp.500.000,00">>Rp.500.000,00</option>
                </select>
                <input type="file" name="tagihanAirBukti" id="tagihanAirBukti" class="form-control" />
          </div>
          <div class="form-group">
              <label for="konstruksiRumah">Konstruksi Rumah:</label>
                <select name="konstruksiRumah" id="konstruksiRumah" class="form-select form-select-sm" required>
                  <option selected>Pilih disini</option>
                  <option value="Permanen">Permanen</option>
                  <option value="Semi-Permanen">Semi-Permanen</option>
                  <option value="Non-Permanen">Non-Permanen</option>
                </select>
                <input type="file" name="konstruksiRumahBukti" id="konstruksiRumah" class="form-control" />
          </div>

              </div>

                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="file" name="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
  </form>
    </section> 
    <div> <br> </div> 

    <!--===== MAIN JS =====-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="../assets/js/main.js"></script>
  </body>
</html>
