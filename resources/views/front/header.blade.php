<header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span>SI-</span>LAYAN</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Beranda</a></li>
          <li><a href="#about-us">Tentang SiLayan</a></li>
          <li><a href="#blog">Blog</a></li>
          @guest
          <li><a href="{{ route('login') }}">Masuk</a></li>
          <li><a href="{{ route('register') }}">Daftar</a></li>
          @else
          <li class="menu-has-children"><a href="#">{{ Auth::user()->name }}</a>
            <ul>
              <li><a href="{{ url('/home') }}">Profil</a></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Keluar') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>
            </ul>
          </li>
          @endguest
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->