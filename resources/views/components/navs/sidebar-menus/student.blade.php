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

<li class="nav-item">
    <a href="{{ asset('student/account') }}"
        class="nav-link {{ Request::segment(2) == 'account' ? 'active' : '' }}">
        <i class="nav-icon far fa-user "></i>
        <p>
            My Account
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ asset('student/change_password') }}"
        class="nav-link {{ Request::segment(2) == 'change_password' ? 'active' : '' }}">
        <i class="nav-icon far fa-user "></i>
        <p>
            Change Password
        </p>
    </a>
</li>
