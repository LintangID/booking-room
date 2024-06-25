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
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'head_office.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="head_office.php">
            <img src="img/kalender.png" width="20px" />
            <span>Head Office</span>
        </a>
    </li>
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'shn.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="shn.php">
            <img src="img/kalender.png" width="20px" />
            <span>SHN Rawa Sumur</span>
        </a>
    </li>
    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'riwayat_peminjaman.php' ? 'active' : ''; ?>">
        <a class="nav-link" href="riwayat_peminjaman.php">
            <img src="img/riwayat.png" width="20px" />
            <span>Riwayat Peminjaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <img src="img/logout.png" width="20px" />
            <span>Logout</span>
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

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Logout" jika anda ingin keluar dan mengakhiri sesi anda.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>