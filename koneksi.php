<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "booking";

$koneksi = mysqli_connect($host, $user, $pass, $name);
if (mysqli_connect_errno()) {
    echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
}
$query = "DELETE FROM sewa WHERE (MONTH(tanggal_sewa) = MONTH(CURDATE() - INTERVAL 1 MONTH) OR TIMESTAMPDIFF(DAY, tanggal_sewa, CURDATE()) > 30) AND (status = 'Dikonfirmasi' OR status = 'Ditolak')";
mysqli_query($koneksi,$query);
//mysqli_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");
