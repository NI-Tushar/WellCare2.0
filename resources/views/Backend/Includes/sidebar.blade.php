<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard')}}" class="brand-link">
      <img src="{{ asset('Frontend')}}/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WellCare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
              <i class="fa-solid fa-house mr-1"></i>
              <p>Dashboard <i class="right fas fa-angle-right"></i></p>
            </a>
          </li>

          @can('isAdmin')
          <li class="nav-item">
            <a href="{{ route('admin.manage.package') }}" class="nav-link">
              <i class="fa-solid fa-house mr-1"></i>
              <p>Packages</p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ Route::is('admin.add-admin.create') || Route::is('admin.add-admin.index') ? 'menu-open' : '' }}">
            <a class="nav-link">
              <i class="fa-solid fa-braille mr-1"></i>
              <p>
                Manage User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.add-admin.create') }}" class="nav-link {{ Route::is('admin.add-admin.create') ? 'active' : '' }}">
                  <i class="fa-solid fa-user-plus mr-1"></i>
                  <p>Add New User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-admin.index') }}" class="nav-link {{ Route::is('admin.add-admin.index') ? 'active' : '' }}">
                  <i class="fa-solid fa-users mr-1"></i>
                  <p>All Users</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Editor')
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fa-brands fa-slideshare mr-1"></i>
              <p>Webiste Hero <i class="right fas fa-angle-right"></i></p>
            </a>
          </li>
          @endif
        @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Editor')
        <li class="nav-item">
          <a href="{{ route('admin.configuration.index') }}" class="nav-link {{ Route::is('admin.configuration.index') || Route::is('admin.configuration.edit')  ? 'active' : '' }}">
            <i class="fa-solid fa-screwdriver-wrench mr-1"></i>
            <p>Configuration <i class="right fas fa-angle-right"></i></p>
          </a>
        </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
