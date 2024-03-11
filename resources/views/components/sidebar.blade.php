<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Soni Klinik</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SK</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li class="nav-item ">
                <a href="#"
                    class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">MASTER DATA</li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link"><i class="fas fa-clinic-medical"></i><span>Profil Klinik</span></a>
            </li>
            <li class="menu-header">USER MANAGEMENT</li>
            <li class="nav-item dropdown ">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('users.index') }}">User</a>
                    </li>
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('doctors.index') }}">Doctor</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
