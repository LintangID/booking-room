<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<style>
 .custom-red {
            background-color: #CC0000;
            color: white;

        }

        a:hover {
    text-decoration: none; /* Menghilangkan garis bawah pada hover */
}
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar2_umum.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "topbar_biasa.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="row mb-5 ml-4 mr-3">
    <?php
    // Ambil data dari tabel head_office
    $query = mysqli_query($koneksi, "SELECT * FROM shn");

    if ($query) {
        foreach ($query as $row) {
            echo "
            <div class='col-xl-3 col-md-9 mb-4'>
                <a href='detail_kalendarshn.php?ruangan_id=" . $row['id'] . "'>
                    <div class='card custom-red border-left-light shadow h-100 py-2'>
                        <div class='card-body'>
                            <div class='row no-gutters align-items-center'>
                                <div class='col mr-2'>
                                    <div class='h5 font-weight-bold text-white text-uppercase mb-1'>
                                        " . $row['nama_ruangan'] . "
                                    </div>
                                    <div class='text-xs mb-0 font-weight-bold text-white'>
                                        Kapasitas: " . $row['kapasitas'] . "
                                    </div>
                                </div>
                                <div class='col-auto'>
                                    <i class='fas fa-clipboard-list fa-2x text-gray-300'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>";
        }
    } else {
        echo "Gagal mengambil data.";
    }
    ?>



                    
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->