<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-align-left"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a title="Webiste View" target="_blank" href="{{ route('home')}}" class="btn btn-md btn-outline-info rounded"><i class="fa-solid fa-earth-asia"></i></a>
      </li>
    </ul>

   <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <span>Profile</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          {{-- <div class="dropdown-item">
            <div style="display: flex;justify-content:space-between;align-items:center">
              <a href="">Change Password</a>
              <i class="fa-solid fa-key"></i>
            </div>
          </div> --}}
          <div class="dropdown-divider"></div>
          @auth('admin')
          <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
              @csrf
              <button style="width:100%;background:none; border:none;display: flex;justify-content:space-between;align-items:center" type="submit">
                <span>Logout</span>
                <i class="fa-solid fa-right-from-bracket"></i>
              </button>
          </form>
          @endauth
        </div>
      </li>
    </ul>
  </nav>
