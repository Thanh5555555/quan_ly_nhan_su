<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('backend/no-avatar.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user() }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        {{-- menu for home page --}}
        <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{ __('message.dashboard') }}
            </p>
          </a>

        </li>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('backend/no-avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- menu for home page --}}
          <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('message.dashboard') }}
              </p>
            </a>
          </li>

          {{-- Task List --}}
          <li class="nav-item {{ Route::currentRouteName() == 'dashboard.employees.index' ? 'menu-open' : '' }}">
            <a href="{{ route('employees.index') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard.employees.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('message.employee_list') }}
              </p>
            </a>
          </li>

          {{-- Category List --}}
          <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('message.category_list') }}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="p-2">
      <form action="#" method="POST">
          @csrf
          <button type="submit" onclick="return confirm('{{ __("message.confirm_logout") }}')"><i class="fas fa-sign-out-alt"></i> <span class="ml-2">{{ __('message.logout') }}</span></button>
        </form>
    </div>
  </aside>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

  <div class="p-2">
    <form action="#" method="POST">
      @csrf
      <button type="submit" onclick="return confirm('{{ __("message.confirm_logout") }}')"><i class="fas fa-sign-out-alt"></i> <span class="ml-2">{{ __('message.logout') }}</span></button>
    </form>
  </div>
</aside>