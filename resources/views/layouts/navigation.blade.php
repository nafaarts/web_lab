<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-flag   "></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            Laporan Lab
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (request()->routeIs('home')) active @endif">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('laporan*')) active @endif">
        <a class="nav-link" href="{{ route('laporan.index') }}">
            <i class="fas fa-fw fa-flag"></i>
            <span>{{ __('Laporan') }}</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if (request()->routeIs('users.index')) active @endif">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Admin') }}</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('laboratorium*')) active @endif">
        <a class="nav-link" href="{{ route('laboratorium.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>{{ __('Laboratorium') }}</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('jenis-barang*')) active @endif">
        <a class="nav-link" href="{{ route('jenis-barang.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>{{ __('Jenis Barang') }}</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('pelapor*')) active @endif">
        <a class="nav-link" href="{{ route('pelapor.index') }}">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>{{ __('Pelapor') }}</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('general*')) active @endif">
        <a class="nav-link" href="{{ route('general.edit') }}">
            <i class="fas fa-fw fa-tools"></i>
            <span>{{ __('General') }}</span></a>
    </li>

    <li class="nav-item @if (request()->routeIs('grafik*')) active @endif">
        <a class="nav-link" href="{{ route('grafik') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>{{ __('Grafik') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline pt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
