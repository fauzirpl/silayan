      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
             <a href="{{ url('/') }}">siLayan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">sN</a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="{{ Storage::url(Auth::user()->foto) }}">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name">{{ Auth::user()->name }}</div>
              <div class="user-role">
                Nelayan
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu Utama</li>
            <li class="nav-link"><a href="{{ url('/home') }}"><i class="ion ion-ios-home"></i><span>Beranda</span></a></li>
            <li class="nav-link"><a href="{{ url('/peta') }}"><i class="ion ion-android-boat"></i><span>Peta Wilayah Laut</span></a></li>
            <li class="menu-header">Profil</li>
            <li class="nav-link"><a href="{{ url('/profil') }}"><i class="ion ion-person"></i><span>Informasi Pengguna</span></a></li>
          </ul>       
        </aside>
      </div>