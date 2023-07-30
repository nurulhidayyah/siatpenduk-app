<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="assets/index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-landmark"></i>
        </div>
        <div class="sidebar-brand-text mx-3">siatpenduk</div>
    </a>


    @can('masyarakat')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/pengajuan*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/dashboard/pengajuan">
                <i class="fas fa-envelope"></i>
                <span>Pengajuan Surat</span></a>
        </li>
    @endcan

    @can('admin')
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <div class="sidebar-heading">
            Administrator
        </div>

        <li class="nav-item {{ Request::is('admin/pengajuan*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/pengajuan">
                <i class="fas fa-envelope-open-text"></i>
                <span>Pengajuan Masuk</span></a>
        </li>

        <li class="nav-item {{ Request::is('admin/pengguna*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/pengguna">
                <i class="fas fa-users"></i>
                <span>Pengguna</span></a>
        </li>

        <li class="nav-item {{ Request::is('admin/riwayat*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/riwayat">
                <i class="fas fa-history"></i>
                <span>Riwayat</span></a>
        </li>
    @endcan

    @can('kades')
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <div class="sidebar-heading">
            Kepala Desa
        </div>

        <li class="nav-item {{ Request::is('kades/validasi*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/kades/validasi">
                <i class="fas fa-envelope-open-text"></i>
                <span>Butuh Acc</span></a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        Setting
    </div>

    <li class="nav-item {{ Request::is('setting/profile') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/setting/profile">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>
    <li class="nav-item {{ Request::is('setting/profile/' . auth()->user()->id . '/edit') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/setting/profile/{{ auth()->user()->id }}/edit">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>
    <li class="nav-item {{ Request::is('setting/ubah_password*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/setting/ubah_password">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
