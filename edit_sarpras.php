<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:tampil_data.php?pesan=belum_login");
} ?>


<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $id = $_POST['id'];
    $nama_ruangan = $_POST['nama_ruangan'];
    $kapasitas = $_POST['kapasitas'];
    $tersedia = $_POST['tersedia'];

    // Query untuk melakukan update data
    $query = "UPDATE head_office SET 
              nama_ruangan='$nama_ruangan', 
              kapasitas='$kapasitas', 
              tersedia='$tersedia' 
              WHERE id='$id'";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        echo "Data berhasil diupdate.";
        // Redirect ke halaman tampil_sarpras_admin.php setelah proses selesai
        header("Location: tampil_sarpras_admin.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">

                        <?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM head_office WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>

<div class="panel-body">
    <form class="form-horizontal style-form" style="margin-top: 20px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">ID Head Office</label>
            <div class="col-sm-6">
                <input name="id" type="text" id="id_user" class="form-control" value="<?php echo $data['id']; ?>" readonly />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Nama Ruangan</label>
            <div class="col-sm-6">
                <input name="nama_ruangan" type="text" id="nama" class="form-control" value="<?php echo $data['nama_ruangan']; ?>" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-4 control-label">Kapasitas</label>
            <div class="col-sm-6">
                <input name="kapasitas" type="number" id="kapasitas" class="form-control" value="<?php echo $data['kapasitas']; ?>" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-4 control-label">Ketersediaan</label>
            <div class="col-sm-6">
                <select name="tersedia" class="form-control" required>
                    <option value="YA" <?php echo $data['tersedia'] == 'YA' ? 'selected' : ''; ?>>YA</option>
                    <option value="TIDAK" <?php echo $data['tersedia'] == 'TIDAK' ? 'selected' : ''; ?>>TIDAK</option>
                </select>
            </div>
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label class="col-sm-2 col-sm-2 control-label"></label>
            <div class="col-sm-8">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
            </div>
        </div>
        <div style="margin-top: 20px;"></div>
    </form>
</div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>