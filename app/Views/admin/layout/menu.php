<li class="nav-item">
    <a href="<?= site_url('/admin') ?>" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= site_url() ?>" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Homepage</p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= site_url('admin/gawe') ?>" class="nav-link  <?= current_url(true)->getSegment(1) == 'gawe' ? 'active' : null ?>">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Gawe
            <span class="right badge badge-danger">New</span>
        </p>
    </a>
</li>
<li class="nav-item <?= current_url(true)->getSegment(1) == 'groups' ? 'menu-open' : null ?>">
    <a href="#" class="nav-link <?= current_url(true)->getSegment(1) == 'groups' ? 'active' : null ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Kontak
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('groups') ?>" class="nav-link <?= current_url(true)->getSegment(1) == 'groups' ? 'active' : null ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Group Kontak</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kontak Saya</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
            Undang
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Saya Mengundang</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Saya Diundang</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">Konfigurasi</li>
<li class="nav-item">
    <a href="<?= site_url() ?>" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Data Master</p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= site_url('ajaxcrud') ?>" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>Tutorial Crud Ajax</p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= site_url('users') ?>" class="nav-link">
        <i class="nav-icon far fa-circle text-info"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?= site_url('auth/logout') ?>" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt text-warning"></i>
        <p>Logout</p>
    </a>
</li>