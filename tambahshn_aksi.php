<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama_ruangan = htmlspecialchars($_POST['nama_ruangan']);
    $kapasitas = intval($_POST['kapasitas']);
    $tersedia = $_POST['tersedia'];

    $stmt = $koneksi->prepare("INSERT INTO shn (nama_ruangan, kapasitas, tersedia) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nama_ruangan, $kapasitas, $tersedia);

    if ($stmt->execute()) {
        header("location:tampil_shn_admin.php");
    } else {
        echo "Gagal menambahkan data: " . $koneksi->error;
    }

    $stmt->close();
    $koneksi->close();
}
?>
