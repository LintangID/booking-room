<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:login.php?pesan=belum_login");
}
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User </h6>
                        </div>
                        <div class="card-body">
                        <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#adduser"><i class="fas fa-plus"></i> Tambah User </button>
                                </div>
                                <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Departemen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "select * from user ");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['username']; ?></td>
                                                <td><?php echo $d['password']; ?></td>
                                                <td><?php echo $d['role']; ?></td>
                                                <td><?php echo $d['departemen']; ?></td>
                                                <td>
                                                    <a href="edit_data.php?id_user=<?php echo $d['id_user']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                    <a href="hapus_aksi.php?id_user=<?php echo $d['id_user']; ?>&role=<?php echo $d['role']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></a>
                                                </td>
                                            </tr>
                            </div>
                        <?php
                                        }
                        ?>
                        </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->
    <!-- Modal Tambah User -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah user -->
                <form action="tambahuser_aksi.php" method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                    <label>Role</label>
                     <select class="form-control" name="role" required>
                         <option value="admin">Admin</option>
                         <option value="pengguna">Pengguna</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <label>Departemen</label>
                        <input type="text" class="form-control" name="departemen" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
