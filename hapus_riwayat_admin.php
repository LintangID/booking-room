<?php
// Include file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Pastikan ada ID yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data
    $sql = "DELETE FROM sewa WHERE id=$id";

    // Lakukan eksekusi SQL
    $result = mysqli_query($koneksi, $sql);

    // Periksa apakah proses insert berhasil
    if ($result) {
        header("Location:sukses_hapus_riwayat_admin.php?success=true");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak valid.";
}
?>
