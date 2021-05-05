<?php 
session_start();

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'functions.php';

if( isset($_POST["login"]) ) {

  $noKK = $_POST["noKK"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE noKK = '$noKK'");

  // cek noKK
  if( mysqli_num_rows($result) === 1 ) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password, $row["password"]) ) {
      // set session
      $_SESSION["login"] = true;

      //header("Location: index.php");
      exit;
    }
  }

  $error = true;

}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>

    <img class="wave" src="img/rumah5.png" />
    <div class="container">
      <div class="img">
        <img src="img/pentaga5.png" />
      </div>
          <div class="login-content">

      <form action="" method="post">
          <img src="img/logo.png" />
          <h2 class="title">Welcome</h2>

          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Nomor Kartu Keluarga</h5>
              <label for="namaLengkap"> </label>
              <input type="text" class="input" id="noKK"  name="noKK" required/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <label for="password"> </label>
              <input type="password" class="input" id="password" name="password" required />
            </div>
          </div>

          <a href="#">Buat akun?</a>
         <!--  <input type="submit" class="btn" value="Login" name="login" /> -->
            <?php if( isset($error) ) : ?>
            <p style="color: red; font-style: italic; font-size: 12px;">Nomor Kartu Keluarga / Password salah</p>
            <?php endif; ?>

          <button type="submit" class="btn" name="login">Masuk</button>

        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
