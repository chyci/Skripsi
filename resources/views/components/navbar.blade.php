<!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center ">
                <div class="row nav-item d-flex align-self-center">
                  <h6 class="fs-6 fw-bold mb-0 align-middle">Klinik Kesehatan Gratis</h6><h6 class="text-primary fs-6 fw-bold mb-0 align-middle">Al-Muhajirin</h6> 
                  
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto gap-2">
                <!-- Place this tag where you want the button to render. -->
                <div class="d-flex">
                  <div class="flex-grow-0 ">
                    <span class="fw-medium d-block badge bg-label-secondary">{{ Auth::user()->name }}</span>
                  </div>
                </div>
                <a href="javascript:void(0)" class=" btn btn-sm btn-outline-danger"><i class="bx bx-log-out-circle me-1"></i>Logout</a>
              </ul>
            </div>
          </nav>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>

          <!-- / Navbar -->