<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Admin</title>
  <!-- General JS Scripts -->
  <script src="{{ asset('back/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('back/modules/popper.js') }}"></script>
  <script src="{{ asset('back/modules/tooltip.js') }}"></script>
  <script src="{{ asset('back/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('back/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('back/modules/moment.min.js') }}"></script>
  <script src="{{ asset('back/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('back/js/scripts.js') }}"></script>
  <script src="{{ asset('back/js/custom.js') }}"></script>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('back/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('back/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('back/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('image/logo.png') }}" alt="logo" width="100">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Halaman Login Admin SiLayan</h4></div>

              <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Ingatkan Saya
                            </label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; SiLayan 2019
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
