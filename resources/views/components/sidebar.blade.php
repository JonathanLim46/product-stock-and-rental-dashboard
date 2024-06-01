<!-- sidebar -->
      <div id="sidebar" class="w-25 d-none d-md-block border-right bg-light">
        <ul class="nav flex-column pt-3 nav-pills ms-5">
          <li class="nav-item mb-4">
            <a class="navbar-brand d-flex align-items-center" href="#">
              <img src="{{asset('img/logo.svg')}}" alt="Logo" width="40" height="50" class="d-inline-block align-text-top">
              <p class="mb-0 ms-2 px-2">Plan The Plants</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}" aria-current="page" href="{{route('dashboard.index')}}">
              <i class="fa-solid fa-chart-pie"></i> <span class="px-2">Dashboard</span>
            </a>
          </li>
          <li class="nav-item pt-4">
            <a class="nav-link rounded {{ Route::currentRouteName() == 'produk.index' ? 'active' : '' }}" href="{{route('produk.index')}}">
              <i class="fa-solid fa-box-open"></i> Produk
            </a>
          </li>
          <li class="nav-item pt-4">
            <a class="nav-link rounded {{ Route::currentRouteName() == 'rental.index' ? 'active' : '' }}" href="{{route('rental.index')}}">
              <i class="fa-solid fa-truck-ramp-box"></i> <span class="px-2">Masa Sewa</span>
            </a>
          </li>
          <li class="nav-item pt-4">
            <a class="nav-link rounded {{ Route::currentRouteName() == 'pelanggan.index' ? 'active' : '' }}" href="{{route('pelanggan.index')}}">
              <i class="fa-solid fa-people-line"></i> <span class="px-2">Pelanggan</span>
            </a>
          </li>
          <li class="nav-item pt-4">
            <a class="nav-link rounded {{ Route::currentRouteName() == 'admin.index' ? 'active' : '' }}" href="{{route('admin.index')}}">
              <i class="fa-solid fa-user-gear"></i> <span class="px-2">Admin</span>
            </a>
          </li>
          <li class="nav-item mt-auto mb-5">
            <a class="nav-link rounded" href="{{route('logout')}}">
              <i class="fa-solid fa-right-from-bracket"></i> <span class="px-2">Log Out</span>
            </a>
          </li>
        </ul>
      </div>
<!-- end sidebar -->
