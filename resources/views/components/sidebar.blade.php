<!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" >
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                  <img src="{{ asset('img/avatars/logo.png')}}" alt class="w-px-40 h-auto rounded-circle" />
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2">Al-Muhajirin</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>
            </li>
            <!-- Pasien -->            
            <li class="menu-item {{ Route::currentRouteName() == 'patient' ? 'active' : '' }}">
              <a href="{{ route('patient') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Pasien">Pasien</div>
              </a>
            </li>
            <!-- Kunjungan -->            
            <li class="menu-item">
              <a href="{{route('visit.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-star"></i>
                <div data-i18n="Kunjungan">Kunjungan</div>
              </a>
            </li>
            <!-- Obat -->            
            <li class="menu-item {{Route::currentRouteName() == 'drug' ? 'active' : ''}}">
              <a href="{{route('drug')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-capsule"></i>
                <div data-i18n="Obat">Obat</div>
              </a>
            </li>
            <!-- Obat Masuk -->            
            <li class="menu-item {{ Route::currentRouteName() == 'drugentry' ? 'active' : '' }}">
              <a href="{{ route('drugentry') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                <div data-i18n="Obat Masuk">Obat Masuk</div>
              </a>
            </li>
            <!-- riwayat pasien -->            
            <li class="menu-item {{ Route::currentRouteName() == 'patienthistory.index' ? 'active' : '' }}">
              <a href="{{route('patienthistory.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-plus"></i>
                <div data-i18n="riwayat pasien">riwayat pasien</div>
              </a>
            </li>
            <!-- Forcasting -->            
            <li class="menu-item {{ Route::currentRouteName() == 'forecasting.index' ? 'active' : '' }}">
              <a href="{{route('forecasting.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-line-chart"></i>
                <div data-i18n="Forecasting">Forecasting</div>
              </a>
            </li>
            <!-- Kelola Akun -->            
            <li class="menu-item {{ Route::currentRouteName() == 'user.edit' ? 'active' : '' }}">
              <a href="{{route('user.edit', Auth::user()->id)}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="kelola akun">Kelola Akun</div>
              </a>
            </li>
            <!-- User -->  
            @if (Auth::user()->role === 'admin')
                <li class="menu-item {{Route::currentRouteName() == 'user.index' ? 'active' : ''}}">
                  <a href="{{route('user.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="user">User</div>
                  </a>
                </li>
            @endif

          </ul>
        </aside>
        <!-- / Menu -->