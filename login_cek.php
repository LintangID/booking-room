<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$departemen = $_POST['departemen'];
$password = $_POST['password'];



// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from user where departemen='$departemen' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $cekrole = mysqli_fetch_array($data);
    $role = $cekrole['role'];
    $nama = $cekrole['nama'];
    $id = $cekrole['id_user'];
    // $departemen = $cekrole['departemen'];
    if($role=='admin'){
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $nama;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        $_SESSION['departemen'] = $departemen;
        header("location:index.php");
    }elseif($role == 'pengguna'){
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $nama;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        $_SESSION['departemen'] = $departemen;
        header("location:head_office.php");
    }elseif($role =='umum'){
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $nama;
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        $_SESSION['departemen'] = $departemen;
        header("location:input_pinjam.php");
    }else {
        
        echo '<script type="text/javascript">';
echo 'window.alert("Username or password is incorrect.");';
echo '</script>';
header("location:login.php");
    }
    
} else {
    
    echo '<script type="text/javascript">';
echo 'window.alert("Username or password is incorrect.");';
echo '</script>';
header("location:login.php");
}
?>