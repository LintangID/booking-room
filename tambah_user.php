<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; 
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:tampil_data.php?pesan=belum_login");
}?>



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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="tambahuser_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                                    <div class="col-sm-6">
                                        <input name="nama_user" type="text" class="form-control"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Username</label>
                                    <div class="col-sm-6">
                                        <input name="username" class="form-control" type="text"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input name="password" class="form-control" type="text"  required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Role</label>
                                    <div class="col-sm-6">
                                        <Select name="role" class="form-control"  required>
                                            <option value="admin">Admin</option>
                                            <option value="pengguna">Pengguna</option>
                                            
                                        </Select>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>


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