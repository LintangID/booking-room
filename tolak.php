<?php
// Include file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Pastikan ada ID yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan proses insert data ke tabel sewa dan ubah kolom "status" menjadi "Dikonfirmasi"
    // Sesuai dengan ID yang diambil dari URL
    $sql = "UPDATE sewa SET status='Ditolak' WHERE id=$id";

    // Lakukan eksekusi SQL
    $result = mysqli_query($koneksi, $sql);

    // Periksa apakah proses insert berhasil
    if ($result) {
        header("Location:riwayat_peminjaman_admin.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak valid.";
}
?>
