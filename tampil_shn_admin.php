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
                            <h6 class="m-0 font-weight-bold text-primary">Data Ruangan SHN</h6>
                        </div>
                        <div class="card-body">
                        <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addshn"><i class="fas fa-plus"></i> Tambah data </button>
                                </div>
                                <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Ruangan</th>
                                            <th>Kapasitas</th>
                                            <th>Ketersediaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        $data = mysqli_query($koneksi, "select * from shn");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo str_replace('_', ' ', $d['nama_ruangan']); ?></td>
                                                <td><?php echo $d['kapasitas']; ?></td>
                                                <td><?php echo $d['tersedia']; ?></td>
                                                
                                                <td>
                                                    <a href="edit_shn.php?id=<?php echo $d['id']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                    <a href="hapus_shn.php?id=<?php echo $d['id']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></a>
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

    <div class="modal fade" id="addshn">
    <div class="text-gray-900 modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header modal-header">
                <h4 class="modal-title">Tambah Data Ruangan SHN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form role="form" action="tambahshn_aksi.php" method="post" enctype="multipart/form-data">
                    <div class="card-body row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan" required>
                            </div>

                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" placeholder="Kapasitas" required>
                            </div>

                            <div class="form-group">
    <label>Ketersediaan</label>
    <select class="form-control" name="tersedia" required>
        <option value="YA">YA</option>
        <option value="TIDAK">TIDAK</option>
    </select>
</div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
