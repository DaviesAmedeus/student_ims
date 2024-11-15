<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="text-align: center; ">
        <span class="brand-text font-weight-bold">Student IMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (Auth::user()->user_type == 1) <!-- Admin -->

                    <li class="nav-item">
                        <a href="{{ asset('admin/dashboard') }}"
                            class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ asset('admin/admin/list') }}"
                            class="nav-link {{ Request::segment(2) == 'admin' ? 'active' : '' }}">
                            <i class="nav-icon far fa-user "></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ asset('admin/class/list') }}"
                            class="nav-link {{ Request::segment(2) == 'class' ? 'active' : '' }}">
                            <i class="nav-icon far fa-user "></i>
                            <p>
                                Class
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ asset('admin/subject/list') }}"
                            class="nav-link {{ Request::segment(2) == 'subject' ? 'active' : '' }}">
                            <i class="nav-icon far fa-user "></i>
                            <p>
                                Subject
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->user_type == 2)<!-- Teacher -->

                    <li class="nav-item">
                        <a href="{{ asset('teacher/dashboard') }}"
                            class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->user_type == 3)<!-- Student -->

                    <li class="nav-item">
                        <a href="{{ asset('student/dashboard') }}"
                            class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->user_type == 4)<!-- Parent -->

                    <li class="nav-item">
                        <a href="{{ asset('parent/dashboard') }}"
                            class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon far fa-exit "></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
