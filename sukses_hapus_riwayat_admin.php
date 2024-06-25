<?php
session_start();

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
                            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Peminjaman</h6>
                        </div>
                        <div class="card-body">
                        <a  class="btn btn-primary btn-sm" href="cetak_laporan.php"><i class="fa fa-print" aria-hidden="true"></i>
                      Cetak Riwayat
                        </a>
                        <div class="col-md-3">
                                    
                                </div>
                                <br>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Penyewa</th>
            <th>Departemen</th>
            <th>No. Hp</th>
            <th>Ruangan</th>
            <th>Keperluan</th>
            <th>Tanggal Sewa</th>
            <th>jam Mulai - Selesai</th>
            <th>Status</th>
            <th>Aksi Konfirm</th> <!-- Tambah kolom Aksi -->
        </tr>
    </thead>
    <tbody>
        <?php
        
        $no = 0;
        $data = mysqli_query($koneksi, "SELECT * FROM sewa ORDER BY id DESC");

        while ($d = mysqli_fetch_array($data)) {
            $no++;
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['departemen']; ?></td>                
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo str_replace('_', ' ', $d['nama_ruangan']); ?></td>
                <td><?php echo $d['keperluan']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tanggal_sewa'])) ?> WIB </td>
<td><?php echo date('H:i', strtotime($d['jam_mulai'])) . ' - ' . date('H:i', strtotime($d['jam_selesai'])); ?> </td>
                <?php
$status = $d['status']; // Ambil nilai status dari data

// Tentukan kelas CSS berdasarkan nilai status
if ($status == 'Menunggu Konfirmasi') {
    $class = 'text-warning';
} elseif ($status == 'Dikonfirmasi') {
    $class = 'text-success';
} elseif ($status == 'Ditolak') {
    $class = 'text-danger';
} else {
    $class = ''; // Atau berikan kelas default jika status tidak dikenali
}
?>

<td class="<?php echo $class; ?>"><b><?php echo $status; ?></b></td>
                <td>
                    <a  class="btn btn-success btn-sm" href="konfirmasi.php?id=<?php echo $d['id']; ?>" >
                       <i class="fa fa-check" aria-hidden="true"></i>
                    </a>
                    <a  class="btn btn-danger btn-sm" href="tolak.php?id=<?php echo $d['id']; ?>" >
                    <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <?php 
                        echo '<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deleteModal' . $d['id'] . '">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>';
                    ?>
                    <!-- <a  class="btn btn-warning btn-sm" href="#"  data-toggle="modal" data-target="#deleteModal" >
                       <i class="fa fa-trash" aria-hidden="true"></i>
                    </a> -->
                </td>
                <!-- MODAL HAPUS -->
            <div class="modal fade" id="deleteModal<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Yes" jika anda ingin menghapus data ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="hapus_riwayat_admin.php?id=<?php echo $d['id']; ?>">Yes</a>
                </div>
                </div>
            </div>
            </tr>
            </div>
            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel<?php echo $d['id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel<?php echo $d['id']; ?>">Aksi Data Sewa <?=$d['nama_ruangan'] ?> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="aksi_admin.php" method="post">
                        <input type="text" class="form-control" name="id" value="<?php echo $d['id']; ?>" hidden>
                    <input type="text" class="form-control" name="nama_ruangan" hidden value="<?=$d['nama_ruangan'] ?>">
                    <div class="form-group">
                    <label for="nama_penyewa_input">Nama Penyewa</label>
                    <input type="text" class="form-control" name="nama" readonly value="<?=$d['nama'] ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="nama_penyewa_input">Nomor HP</label>
                        <input type="text" class="form-control" name="no_hp" readonly value="<?=$d['no_hp'] ?>">
                    </div> -->
                    <div class="form-group">
                        <label for="keperluan_input">Keperluan</label>
                        <input type="text" class="form-control" name="keperluan" readonly value="<?=$d['keperluan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sewa_input">Tanggal Sewa</label>
                        <input type="datetime-local" class="form-control" name="waktu_sewa" readonly value="<?=$d['tanggal_sewa'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="waktu_pemakaian">jam_mulai</label>
                    <input type="datetime-local" class="form-control" id="waktu_pemakaian" name="jam_mulai" readonly value="<?=$d['jam_mulai'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="waktu_pemakaian">jam_selsai</label>
                    <input type="datetime-local" class="form-control" id="waktu_pemakaian" name="jam_mulai" readonly value="<?=$d['jam_selesai'] ?>">
                    </div>
                    <div class="form-group">
            <label for="status_input">Pilih Tindakan</label>
            <select class="form-control" name="status">
                <option value="Ditolak" <?php echo ($d['status'] == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                <option value="Dikonfirmasi" <?php echo ($d['status'] == 'Dikonfirmasi') ? 'selected' : ''; ?>>Dikonfirmasi</option>
            </select>
        </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-info" value="Simpan"></button>
            </div>
            </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- MODAL BERHASIL HAPUS -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>SUKSES!</h4>
                <img src="img/sukses.png" width="100px"/><br>
            RIWAYAT PEMINJAMAN BERHASIL DIHAPUS
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-succes" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


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

<script>
$(document).ready(function() {
    // Periksa apakah ada parameter 'success' pada URL
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    // Jika 'success' bernilai 'true', tampilkan modal
    if (successParam === 'true') {
        $('#myModal').modal('show');
        const autoCloseTime = 2000;
        setTimeout(function() {
        modal.modal('hide');
        window.location.href = "riwayat_peminjaman_admin.php";
    }, autoCloseTime);
    }
});
</script>

<script>
$(document).ready(function() {
    const modal = $('#myModal');

    // Tampilkan modal
    modal.modal('show');

    // Atur waktu penutupan modal (dalam milidetik)
    const autoCloseTime = 2000; // Contoh: tutup setelah 5 detik (5000 milidetik)

    // Setelah waktu tertentu, tutup modal dan arahkan ke halaman "riwayat_peminjaman.php"
    setTimeout(function() {
        modal.modal('hide');
        window.location.href = "riwayat_peminjaman_admin.php";
    }, autoCloseTime);
});
</script>