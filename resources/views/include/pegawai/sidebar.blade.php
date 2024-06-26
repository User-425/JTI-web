<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">kantin JTI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link " href="{{ url('dashboard ')}}">
            <i class="fas fa-solid fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <i class="fas fa-regular fa-cash-register"></i>
            <span>Biling Kasir</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Transaksi:</h6>
                <a class="collapse-item" href="{{ url('pembelian ')}}">Pembelian</a>
                <a class="collapse-item" href="{{ url('restock ')}}">Restock</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{ url('daftar_produk ')}}">
            <i class="fas fa-solid fa-list-ul"></i>
            <span>Daftar Produk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('kelola_pengguna ')}}">
            <i class="fas fa-solid fa-user-cog"></i>
            <span>Kelola Pengguna</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('kelola_pemasok ')}}">
            <i class="fas fa-solid fa-wrench"></i>
            <span>Kelola Pemasok</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Riwayat
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('transaksi/pembelian ')}}">
            <!-- <i class="fas fa-solid fa-hand-holding-usd"></i> -->
            <i class="fas fa-solid fa-file-invoice-dollar"></i>
            <span>Transaksi Pembelian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('transaksi/penyediaan ')}}">
            <!-- <i class="fas fa-solid fa-handshake"></i> -->
            <i class="fas fa-solid fa-receipt"></i>
            <span>Transaksi Penyediaan</span></a>
    </li>

    <!-- 
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>