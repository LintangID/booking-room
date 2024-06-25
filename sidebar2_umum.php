<!-- Sidebar -->
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
<ul class="navbar-nav custom-card sidebar sidebar-dark accordion" id="accordionSidebar">
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
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'kalendar.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="kalendar.php">
            <img src="img/kalender.png" width="20px" />
            <span>Head Office</span>
        </a>
    </li>
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'kalendarshn.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="kalendarshn.php">
            <img src="img/kalender.png" width="20px" />
            <span>SHN Rawa Sumur</span>
        </a>
    </li>
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="login.php">
            <img src="img/riwayat.png" width="20px" />
            <span>Booking</span>
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
