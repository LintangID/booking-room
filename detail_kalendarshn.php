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


// Ambil ruangan ID dari URL
if(isset($_GET['ruangan_id'])) {
    $ruangan_id = $_GET['ruangan_id'];

    // Query untuk mengambil data ruangan berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM shn WHERE id='$ruangan_id'");
    
    // Periksa apakah query berhasil dijalankan
    if ($query) {
        $row = mysqli_fetch_assoc($query);

        // Tampilkan data ruangan sesuai ID
        echo "
            <div class='col-xl-3 col-md-3 mb-4'>
            <div class='card custom-red o-hidden border-0 shadow-lg' style='height: 90px;'>
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
                </div> <br>
            </div> ";
           
            
                         
?>
<div class='col-xl-7 col-md-9 mb-4 '>
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-center text-primary">JADWAL RUANG MEETING</h6>
     </div>
     <div class="card-body">
     <div class="table-responsive">
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
        <th>No</th>
            <th>Tanggal </th>
            <th>Jam </th>
           
            <th>Departemen</th>
            <th>Keperluan</th>
          
            <!-- Tambah kolom Aksi -->
        </tr>
    </thead>
    <tbody>
    <?php
        $ruang = $row['nama_ruangan'];
        $no = 0;
        $data = mysqli_query($koneksi, "SELECT * FROM sewa WHERE nama_ruangan = '$ruang' AND status = 'Dikonfirmasi' ORDER BY tanggal_sewa ASC");

        while ($d = mysqli_fetch_array($data)) {
            $no++;
        ?>
   <?php
// Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
if (!function_exists('getIndonesianDay')) {
    // Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
    function getIndonesianDay($day) {
        $days = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        return $days[$day];
    }
}

// Memanggil fungsi getIndonesianDay untuk mendapatkan hari dalam bahasa Indonesia
$hari_sewa = getIndonesianDay(date('l', strtotime($d['tanggal_sewa'])));
?>

<tr>
    <td> <?= $no ?> </td>
<td><?php echo $hari_sewa . ' '.date('d-m-Y', strtotime($d['tanggal_sewa'])) ?>  </td>
<td><?php echo date('H:i', strtotime($d['jam_mulai'])) . ' - ' . date('H:i', strtotime($d['jam_selesai'])); ?> </td>
<td><?php echo $d['departemen']; ?> </td>
<td><?php echo $d['keperluan']; ?> </td>

</tr>




         <?php
         }
         ?>
                
                
    </tbody>

    </table>
    </div>
</div>
</div>
</div>
         <?php  


    } else {
        echo "Gagal mengambil data ruangan.";
    }
} else {
    echo "ID ruangan tidak valid.";
    
}
?>


                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->
    <script>
    function openModal(id) {
        // Dapatkan nama ruangan sesuai dengan ID
        var namaRuangan = "Nama Ruangan " + id; // Ganti dengan logika untuk mendapatkan nama ruangan sesuai dengan ID

        // Set nilai Nama Ruangan pada input di modal
        document.getElementById('nama_ruangan_input').value = namaRuangan;

        // Buka modal
        $('#modalPesanRuangan').modal('show');
    }
</script>


<script>
$(document).ready(function() {
    // Hancurkan DataTable sebelum inisialisasi baru
    if ($.fn.DataTable.isDataTable('#dataTable')) {
        $('#dataTable').DataTable().destroy();
    }

    // Inisialisasi DataTable dengan pengaturan khusus
    $('#dataTable').DataTable({
        "columnDefs": [{
            "targets": [1],  // Kolom pertama (indeks 0)
            "orderable": false  // Mengatur agar tidak dapat diurutkan
        }]
    });
});

</script>
