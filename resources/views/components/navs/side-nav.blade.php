<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="text-align: center; ">
        <span class="brand-text font-weight-bold">Student IMS</span>
    </a>

    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset( Auth::user()->getProfilePicture()) }}" class="img-circle elevation-2" alt="User Image">
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
                  <x-navs.sidebar-menus.admin />
                @endif

                @if (Auth::user()->user_type == 2)<!-- Teacher -->
                <x-navs.sidebar-menus.teacher />
                @endif

                @if (Auth::user()->user_type == 3)<!-- Student -->
                <x-navs.sidebar-menus.student />
                @endif

                @if (Auth::user()->user_type == 4)<!-- Parent -->
                <x-navs.sidebar-menus.parent />
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
    <!-- End sidebar -->
</aside>
