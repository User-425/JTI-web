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
    <a class="nav-link" href="{{ url('pembeli/dashboard ')}}">
        <i class="fas fa-fw fa-calculator"></i>
        <span>Cek Harga</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ url('pembeli/transaksi ')}}">
        <i class="fas fa-fw fa-receipt"></i>
        <span>Riwayat Pembelian</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>