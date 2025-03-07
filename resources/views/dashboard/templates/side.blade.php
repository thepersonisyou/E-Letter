<aside id="sidebar" class="border-end">
    <div class="h-100 ">
        <div class="sidebar-logo">
            <a href="#"><img src="{{ asset('img/assets/logo-light.svg') }}" alt="" width="150px"></a>
        </div>
        <ul class="sidebar-nav">
    <li class="sidebar-header">
        Admin Elements
    </li>
    <li class="sidebar-item">
        <a href="/dashboard" class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line pe-2"></i>
            Dashboard
        </a>
    </li>
    <li class="sidebar-item">
        <a href="#"
            class="sidebar-link collapsed {{ request()->is('suratkeluar', 'suratmasuk', 'surat/create', 'edit') ? 'active' : '' }}"
            data-bs-target="#surat" data-bs-toggle="collapse" aria-expanded="false">
            <i class="fa-solid fa-envelope pe-2"></i>
            Surat
        </a>

        <ul id="surat" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="/surat/create" class="sidebar-link {{ request()->is('surat/create') ? 'active' : '' }}">
                    <i class="fa-solid fa-plus-circle pe-2"></i>
                    Tambah Surat
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/suratmasuk" class="sidebar-link {{ request()->is('suratmasuk') ? 'active' : '' }}">
                    <i class="fa-solid fa-inbox pe-2"></i>
                    Surat Masuk
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/suratkeluar" class="sidebar-link {{ request()->is('suratkeluar') ? 'active' : '' }}">
                    <i class="fa-solid fa-paper-plane pe-2"></i>
                    Surat Keluar
                </a>
            </li>
        </ul>
    </li>
    @if (in_array(auth()->user()->role, ['admin', 'developer']))
        <li class="sidebar-item">
            <a href="#" class="sidebar-link {{ request()->is('Blog') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper pe-2"></i>
                Blog
            </a>
        </li>
    @endif
    <li class="sidebar-header">
        Settings
    </li>
    <li class="sidebar-item">
        <a href="/logout" class="sidebar-link">
            <i class="fa-solid fa-sign-out-alt pe-2"></i>
            Sign Out
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{ route('editakun', ['id' => Auth::id()]) }}"
            class="sidebar-link {{ request()->routeIs('editakun') ? 'active' : '' }}">
            <i class="fa-solid fa-user-edit pe-2"></i>
            Edit Akun
        </a>
    </li>
    @if (in_array(auth()->user()->role, ['admin', 'developer']))
        <li class="sidebar-item">
            <a href="/semuapengguna" class="sidebar-link {{ request()->is('semuapengguna') ? 'active' : '' }}">
                <i class="fa-solid fa-users-cog pe-2"></i>
                Data Pengguna
            </a>
        </li>
    @endif


</ul>

    </div>
</aside>
