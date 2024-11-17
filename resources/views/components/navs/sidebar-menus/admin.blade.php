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

<li class="nav-item">
    <a href="{{ asset('admin/assign_subject/list') }}"
        class="nav-link {{ Request::segment(2) == 'assign_subject' ? 'active' : '' }}">
        <i class="nav-icon far fa-user "></i>
        <p>
            Assigned Subjects
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ asset('admin/change_password') }}"
        class="nav-link {{ Request::segment(2) == 'change_password' ? 'active' : '' }}">
        <i class="nav-icon far fa-user "></i>
        <p>
            Change Password
        </p>
    </a>
</li>
