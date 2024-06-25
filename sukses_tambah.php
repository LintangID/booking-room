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
        <?php include "sidebar_umum.php"; ?>
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
                        <div class="col-md-3">
                                    
                                </div>
                                <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Ruangan</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Jam Mulai - Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nama = mysqli_real_escape_string($koneksi, $_SESSION['nama']);

                                        // SQL query to select rows where "nama" matches the session value
                                       
                                        $no=0;
                                        $data = mysqli_query($koneksi, "SELECT * FROM sewa WHERE nama_akun = '$nama' ORDER BY id DESC");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo str_replace('_', ' ', $d['nama_ruangan']); ?></td>
                                                <td><?php echo $d['keperluan']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($d['tanggal_sewa'])) ?> WIB </td>
<td><?php echo date('H:i', strtotime($d['jam_mulai'])) . ' - ' . date('H:i', strtotime($d['jam_selesai'])); ?> </td>
                                                <?php
$status = $d['status']; // Ambil nilai status dari data

// Tentukan kelas CSS berdasarkan nilai status
if ($status == 'Menunggu Konfirmasi') {
    $class = 'bg-gradient-warning p-1 rounded text-white';
} elseif ($status == 'Dikonfirmasi') {
    $class = 'bg-gradient-success p-1 rounded text-white';
} elseif ($status == 'Ditolak') {
    $class = 'bg-gradient-danger p-1 rounded text-white';
} else {
    $class = ''; // Atau berikan kelas default jika status tidak dikenali
}
?>

<td class=""><b class="<?php echo $class; ?>"><?php echo $status; ?></b></td>
                                                
                                               
                                                
                                                 <td>
    <?php
    if ($d['status'] === '' || $d['status'] === '')  {
        echo ' - ';
    } else {
        echo '<a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus' . $d['id'] . '">Batalkan</a>';
    }
    ?>
</td>
                                                    </td>

                                                </td> 
                                            </tr>
                            </div>
                            <div class="modal fade" id="modalHapus<?= $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel<?php echo $d['id']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusLabel<?= $d['id']; ?>">Konfirmasi Hapus Data Sewa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin membatalkan penyewaan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="hapus_sewa.php?id=<?= $d['id']; ?>" class="btn btn-danger">Ya, Batalkan</a>
            </div>
        </div>
    </div>
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
<!-- Modal -->
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
            RESERVASI RUANG MEETING BERHASIL DILAKUKAN
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-succes" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Periksa apakah ada parameter 'success' pada URL
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    // Jika 'success' bernilai 'true', tampilkan modal
    if (successParam === 'true') {
        $('#myModal').modal('show');
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
        window.location.href = "riwayat_peminjaman.php";
    }, autoCloseTime);
});
</script>




