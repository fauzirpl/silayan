      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
             <a href="{{ url('/') }}">siLayan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">sN</a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="{{ Storage::url(Auth::guard('admin')->user()->image) }}">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name">{{ Auth::guard('admin')->user()->name }}</div>
              <div class="user-role">
                Administrator
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="{{ url('admin/home') }}"><i class="ion ion-speedometer"></i><span>Beranda</span></a>
            </li>
            <li>
              <a href="{{ url('admin/ikan') }}"><i class="ion-android-folder"></i><span>Data Master Ikan</span></a>
            </li>
            <li>
              <a href="{{ url('admin/harga') }}"><i class="ion-social-bitcoin"></i><span>Data Harga Ikan</span></a>
            </li>
            <li>
              <a href="{{ url('admin/datanelayan') }}"><i class="ion-ios-people"></i><span>Data Nelayan</span></a>
            </li>
            <li>
              <a href="{{ url('admin/petanelayan') }}"><i class="ion-map"></i><span>Persebaran Nelayan</span></a>
            </li>
            <li>
              <a href="{{ url('admin/profil') }}"><i class="ion-person-stalker"></i><span>Pengaturan Admin</span></a>
            </li>

          </ul>
        </aside>
      </div>