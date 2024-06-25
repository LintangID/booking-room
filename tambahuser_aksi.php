<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $departemen = $_POST['departemen'];

    // Query untuk menambahkan user baru
    $query = "INSERT INTO user (nama, username, password, role, departemen) VALUES ('$nama', '$username', '$password', '$role', '$departemen')";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        echo "User berhasil ditambahkan.";
        // Redirect ke halaman tampil_data.php setelah proses selesai
        header("Location: tampil_data.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>
