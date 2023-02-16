<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('images/avatar/avatar_admin.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> <b> &nbsp;Quản trị viên</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    @php
                        $activeDashboard = request()->segment(2) == '' ? 'active' : '';
                    @endphp
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ $activeDashboard }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tổng quan</p>
                    </a>
                </li>
                <li class="nav-item">
                    @php
                    $activeEmployee = request()->segment(2) == 'employees' ? 'active' : '';
                    @endphp
                    <a href="{{ route('employees.index') }}" class="nav-link {{ $activeEmployee }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Nhân viên</p>
                    </a>
                </li>
                <li class="nav-item">
                @php
                    $activeTask = request()->segment(2) == 'tasks' ? 'active' : '';
                    @endphp
                    <a href="{{ route('tasks.index') }}" class="nav-link {{ $activeTask }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Công Việc</p>
                    </a>
                </li>
                <li class="nav-item">
                    @php
                        $activeReceipt = request()->segment(2) == 'receipts' ? 'active' : '';
                    @endphp
                    <a href="{{ route('receipts.index') }}" class="nav-link {{ $activeReceipt }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>Thu chi</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    @php
                        $activePayment = request()->segment(2) == 'payments' ? 'active' : '';
                    @endphp
                    <a href="#" class="nav-link {{ $activePayment }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>thu chi</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    @php
                        $activeReport = request()->segment(2) == 'reports' ? 'active' : '';
                    @endphp
                    <a href="{{ route('reports.index') }}" class="nav-link {{ $activeReport }}">
                        <i class="nav-icon fas fa-search-dollar"></i>
                        <p>Tổng kết</p>
                    </a>
                </li>


                <li class="nav-item">
                    @php
                        $activeLogwork = request()->segment(2) == 'logworks' ? 'active' : '';
                    @endphp
                    <a href="{{ route('logworks.index') }}" class="nav-link {{ $activeLogwork }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Chấm công</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    @php
                        $activeSalary = request()->segment(2) == 'salaries' ? 'active' : '';
                    @endphp
                    <a href="{{ route('salaries.index') }}" class="nav-link {{ $activeSalary }}">
                        <i class="nav-icon fas fa-funnel-dollar"></i>
                        <p>Bảng lương</p>
                    </a>
                </li>
                <li class="nav-item">
                    @php
                        $activeChange = request()->segment(2) == 'change' ? 'active' : '';
                    @endphp
                    <a href="{{ route('change') }}" class="nav-link {{ $activeChange }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Đổi mật khẩu</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    @php
                        $activeMoney = request()->segment(2) == 'moneys' ? 'active' : '';
                    @endphp
                    <a href="#" class="nav-link {{ $activeMoney }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>Thu chi</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    @php
                        $activeAppointment = request()->segment(2) == 'appointments' ? 'active' : '';
                    @endphp
                    <a href="#" class="nav-link {{ $activeAppointment }}">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Lịch hẹn</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    @php
                        $activeAccount = request()->segment(2) == 'holidays' ? 'active' : '';
                    @endphp
                    <a href="#" class="nav-link {{ $activeAccount }}">
                        <i class="nav-icon fas fa-headphones"></i>
                        <p>Ngày nghỉ lễ</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    @php
                        $activeAccount = request()->segment(2) == 'settings' ? 'active' : '';
                    @endphp
                    <a href="#" class="nav-link {{ $activeAccount }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Thiết lập chế độ lương</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    @php
                        $activeLogwork = request()->segment(2) == 'logwork' ? 'active' : '';
                    @endphp
                    <a href="{{route('logworks.index')}}" class="nav-link {{ $activeLogwork }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Chấm công</p>
                    </a>
                </li> -->


                
                {{--<li class="nav-item has-treeview">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fas fa-chart-pie"></i>--}}
                        {{--<p>--}}
                            {{--Kho thuốc--}}
                            {{--<i class="right fas fa-angle-left"></i>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-treeview">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="far fa-circle nav-icon"></i>--}}
                                {{--<p>Danh sách thuốc</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="pages/charts/inline.html" class="nav-link">--}}
                                {{--<i class="far fa-circle nav-icon"></i>--}}
                                {{--<p>Quản lý kho</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
