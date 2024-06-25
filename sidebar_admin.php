<style>
    .custom-card {
        background-color: #021899;
        color: white;
    }

    .nav-item.active {
    background-color: rgba(255, 255, 255, 0.3); /* Ubah nilai alpha sesuai keinginan (0-1) */
    border-radius: 20px;
}
</style>

<!-- Sidebar -->
<ul class="navbar-nav custom-card sidebar sidebar-dark " id="accordionSidebar">
<br>
    <!-- Sidebar - Brand -->
    <div class="nav-item justify-content-center text-center ">
   
   <a class="nav-link h4 text-center p-1" href="">
   <img src="img/kalender.png"  width="40px" align="center" /><br>
       <span class="text-center"><b>GALERI RUANG MEETING</b></span>
   </a>
</div>

    <!-- Divider -->
    
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tampil_sarpras_admin.php' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="tampil_sarpras_admin.php">
            <img src="img/kalender.png" width="20px" />
            <!-- <i class="fas fa-fw fa-folder"></i> -->
            <span>Head Office</span>
        </a>
    </li>

    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tampil_shn_admin.php' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="tampil_shn_admin.php">
            <img src="img/kalender.png" width="20px" />
            <!-- <i class="fas fa-fw fa-folder"></i> -->
            <span>SHN</span>
        </a>
    </li>

    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'riwayat_peminjaman_admin.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="riwayat_peminjaman_admin.php">
        <img src="img/riwayat.png" width="20px" />
            <span>Riwayat Peminjaman</span>
        </a>
    </li>

    <!-- User Menu -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tampil_data.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="tampil_data.php?role=admin">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
