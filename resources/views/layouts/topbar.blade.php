      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('admin')->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ url('/profil') }}" class="dropdown-item has-icon">
                <i class="ion ion-android-person"></i> Pengaturan Admin
              </a>
              <a href="{{ url('/logout') }}" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>