<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS-->
    <link href="{{ asset('teme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('teme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('teme/css/sb-admin.css')}}" rel="stylesheet">



  </head>

  <body class="bg-light">

        <div class="container">
                <div class="card card-login mx-auto mt-5">
                  <div class="card-header">Login</div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="form-group">
                        <div class="form-label-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                          <label for="inputEmail">Email address</label>
                          @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <label for="inputPassword">Password</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                              
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember Password
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </form>
                    <div class="text-center">
                      <a class="d-block small mt-3" href="{{ route('register') }}">Registrar una Cuenta</a>

                      @if (Route::has('password.request'))
                      <a class="d-block small" href="{{ route('password.request') }}">
                          {{ __('Olvidé mi contraseña') }}
                      </a>
                  @endif
                    </div>
                  </div>
                </div>
              </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      </body>

</html>
