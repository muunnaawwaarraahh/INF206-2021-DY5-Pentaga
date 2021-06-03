<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laman Registrasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/style1.css" />
</head>
<body>

    <div class="regis-text">
        <h1 style="text-align: center; padding-top:10px ; color:white; font-family: Courier, monospace ;">REGISTRASI</h1>
    </div>
    <div class="registration-form" style="padding-top:10px">
        <form action="" method="post">
            <div class="form-icon">
                <div>
                <span>
                  <img src="asset\img\logo1.png">
                  <!-- <div class="form-icon">
                    <h4 >LAMAN REGISTRASI</h4>
                  </div> -->
                </span>
                </div>
            </div>
            <div >
              <label for="namaLengkap">Nama Lengkap </label>
                <input type="text" class="form-control item" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required>
            </div>
            <div >
              <label for="noKK">Nomor Kartu Keluarga </label>
                <input type="text" class="form-control item" id="noKK"  name="noKK" placeholder="Nomor Kartu Keluarga" required>
            </div>
             <div >
              <label for="password">Password </label>
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password" required>
            </div>
             <div >
              <label for="password2">Konfirmasi Password </label>
                <input type="password" class="form-control item" id="password2"  name="password2" placeholder="Konfirmasi Password" required>
            </div>
            <div >
                <button type="submit" name="register" class="btn btn-block create-account">Daftar</button>
            </div>

            <div >
                    <a class="d-block text-center mt-2 small" href="/RPL/login_register/login.php">Login</a>
            </div>

               
        </form>
        
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>
</html>
