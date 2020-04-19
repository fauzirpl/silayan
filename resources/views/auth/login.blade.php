<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masuk | {{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" integrity="sha384-DmABxgPhJN5jlTwituIyzIUk6oqyzf3+XuP7q3VfcWA2unxgim7OSSZKKf0KSsnh" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:35px;}

      .form-heading { color:#fff; font-size:23px;}
      .panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
      .panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
      .panel img { color:#777777; font-size:14px; margin-bottom:20px; line-height:24px;}
      .login-form .form-control {
        background: #f7f7f7 none repeat scroll 0 0;
        border: 1px solid #d4d4d4;
        border-radius: 4px;
        font-size: 14px;
        height: 50px;
        line-height: 50px;
      }
      .main-div {
        background: #ffffff none repeat scroll 0 0;
        border-radius: 2px;
        margin: 10px auto 30px;
        max-width: 38%;
        padding: 50px 70px 70px 71px;
      }

      .login-form .form-group {
        margin-bottom:15px;
      }
      .login-form{ text-align:center;}
      .forgot a {
        color: #777777;
        font-size: 14px;
        text-decoration: underline;
      }
      .forgot {
        text-align: left; margin-bottom:30px;
      }
      .botto-text {
        color: #ffffff;
        font-size: 14px;
        margin: auto;
      }
      .login-form .btn.btn-primary.reset {
        background: #ff9900 none repeat scroll 0 0;
      }
      .back { text-align: left; margin-top:10px;}
      .back a {color: #444444; font-size: 13px;text-decoration: none;}
    </style>
</head>
<body id="LoginForm">
<div class="container">
<div class="login-form">
<div class="main-div">
  <div class="panel">
   <img src="{{ asset('image/logo.png') }}" alt="">
   </div>
    <form id="Login" class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
        <label for="inputEmail" class="sr-only">Alamat email</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email anda">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Kata sandi</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Masukkan kata sandi anda">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
        @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Lupa kata sandi?') }}
                </a>
        @endif
      <div class="form-group row mb-0">
        <div class="col-md-12 offset-md-12">
            <button type="submit" class="btn btn-lg btn-primary btn-block">
                {{ __('Masuk') }}
            </button>
            <a class="btn btn-block btn-social btn-facebook" href="{{ url('auth/facebook') }}">
                <i class="fab fa-facebook"></i> Masuk dengan Facebook
            </a>
        </div>
      </div>
      <a class="btn btn-link" href="{{ url('/register') }}">
                    {{ __('Belum punya akun? Daftar disini') }}
      </a>
    </form>
    </div>
</div>
</div>


</body>
</html>
