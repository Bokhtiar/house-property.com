<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->




        {{-- @isset(auth()->user()->role->permission['permission']['department']['list'])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#department" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="department" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="@route('department.index')">
                            <i class="bi bi-circle"></i><span>Department</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Department Nav -->
        @endisset --}}

       


        <li class="nav-item">
            <a class="nav-link " href="{{ url('logouts') }}">
                <i class="bi bi-grid"></i>
                <span>Logout</span>
            </a>
        </li><!-- End side Nav -->
    </ul>
</aside>