<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../assets_login/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>

    <img class="wave" src="../assets_login/img/rumah5.png" />
    <div class="container">
      <div class="img">
        <img src="../assets_login/img/pentaga5.png" />
      </div>
          <div class="login-content">

      <form action="/admin/check" method="post" autocomplete="off">
      @csrf
          <img src="../assets_login/img/logo.png" />
          <h2 class="title">Welcome Admin</h2>
          <br>         
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
            
          <br>

          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Username</h5>
              <label for="username"> </label>
              <input type="text" class="input" id="username"  name="username" value="{{ old('username') }}" required/>
            </div>
            </div>
            
            <div class="div-eror">
              @error('username')
                    <span class="invalid-feedback">{{ $message }}</span>
              @enderror
              </div>
          
          
          <div class="input-div ">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <label for="password"> </label>
              <input type="password" class="input" id="password" name="password" value="{{ old('password') }}" required/>
            </div>
          </div>
          <div class="div-eror">
              @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
              @enderror
          </div>

          <a href="{{ url('/warga/login') }}">Login Warga</a>
        

          <button type="submit" class="btn" >Masuk</button>

        </form>
      </div>
    </div>
    <script type="text/javascript" src="../assets_login/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js;"> </script>
  </body>
</html>
