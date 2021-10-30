<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SCHOOL<sup><i class="fas fa-school"></i></sup></div>
    </a>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ URL('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Heading -->
    <br>
    <div class="sidebar-heading">
        OPTIONS
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PAGES</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if(Auth::user()->type == 1)
                    <h6 class="collapse-header">Admin</h6>
                    <a class="collapse-item" href="{{ URL('batch') }}">Batch</a>
                    <a class="collapse-item" href="{{ URL('deportment') }}">Deportment</a>
                    <a class="collapse-item" href="{{ URL('subject') }}">Subjects</a>
                    <a class="collapse-item" href="{{ URL('exam') }}">Exams</a>
                @endif
                @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                <h6 class="collapse-header">All Details</h6>
                <a class="collapse-item" href="{{ URL('user') }}">All Users</a>
                <a class="collapse-item" href="{{ URL('teacher') }}">Teachers</a>
                <a class="collapse-item" href="{{ URL('student') }}">Students</a>
                @endif
                <h6 class="collapse-header">Result</h6>
                @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                <a class="collapse-item" href="{{ URL('/result/create') }}">Update result</a>
                @endif
                <a class="collapse-item" href="{{ URL('result') }}">View Result</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Heading -->
    <br>
    <div class="sidebar-heading">
        TOOLS
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>OTHERS</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            @if (Route::has('login'))
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                @auth
                    <a class="collapse-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="collapse-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="collapse-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="collapse-divider"></div>
                    <a class="collapse-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a class="collapse-item" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a class="collapse-item" href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
            </div>
            @endif
        </div>
    </li>
    <!-- Nav Item - Charts -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">--}}
{{--            <i class="fas fa-fw fa-chart-area"></i>--}}
{{--            <span>Charts</span></a>--}}
{{--    </li>--}}
{{--            <!-- Nav Item - Tables -->--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="tables.html">--}}
{{--                    <i class="fas fa-fw fa-table"></i>--}}
{{--                    <span>Tables</span></a>--}}
{{--            </li>--}}

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
