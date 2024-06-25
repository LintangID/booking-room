<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<?php
session_start();
if ($_SESSION['role'] != "admin") {
  header("location:landing_page.php");
}
include "koneksi.php";
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include "sidebar_admin.php"; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php include "topbar_admin.php"; ?>
        <div class='row mb-5 ml-4 mr-3'>

          <div class="col-xl-6 col-md-9 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Menunggu Konfirmasi
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php $data = mysqli_query($koneksi, "select * from sewa where status='Menunggu Konfirmasi'");
                      $d = mysqli_num_rows($data);
                      echo $d;
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-9 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      Total Peminjaman Dikonfirmasi
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php $data = mysqli_query($koneksi, "select * from sewa where status='Dikonfirmasi'");
                      $d = mysqli_num_rows($data);
                      echo $d;
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

       
        
      </div>
      <!-- End of Main Content -->
      <?php include "footer.php"; ?>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
</body>

</html>