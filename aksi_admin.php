<?php
include 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$nama_ruangan = $_POST['nama_ruangan'];
$nama_penyewa = $_POST['nama'];
$keperluan = $_POST['keperluan'];
$tanggal_sewa =date('Y-m-d',strtotime($_POST['waktu_sewa']));  // Ubah format waktu
$jam_mulai = $_POST['jam_mulai']; 
$jam_selesai = $_POST['jam_selesai']; 
$status = $_POST['status'];

// Update data di tabel sewa berdasarkan nama ruangan
$sql = "UPDATE sewa 
        SET keperluan='$keperluan', waktu_sewa='$tanggal_sewa', jam_selesai='$jam_selesai' , jam_mulai='$jam_mulai', status='$status'
        WHERE id='$id' AND nama_ruangan='$nama_ruangan'";


if (mysqli_query($koneksi, $sql)) {
    // Jika berhasil diupdate, arahkan kembali ke halaman yang sesuai
    header("Location:riwayat_peminjaman_admin.php");
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
