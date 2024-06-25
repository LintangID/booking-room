<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/kalender.png">
    <title>Galeri Ruang Meeting</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="">

</head>

<body class="bg-gradient-light">

    <?php
    session_start(); 
    include 'koneksi.php';

    // if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    //     header("location: login.php");
    //     exit();


    // }else if(isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    //     // Pengguna sudah login, redirect ke halaman sesuai dengan rolenya
    //     $role = $_SESSION['role'];
    
    //     if($role == 'admin') {
    //         header("location: index.php");
    //         exit();
    //     } elseif($role == 'pengguna') {
    //         header("location: head_office.php");
    //         exit();
    //     }
    // }



    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah!";
        } else if ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>

    <div class="container">

        <!-- Outer Row -->

        <br>
        <br>
        <br>
        <br>
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-0 d-none d-lg-block"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                       
                                        <h4 class="text-gray-900">Masuk Ke Kalender Reservasi</h4>
                                        <div class="text-center">
                                      <!-- Belum punya akun?  <a class="small" href="regis.php">Daftar akun disini</a> -->
                                    </div>
                                    <hr>
                                    Silahkan Login<br>
                                    </div>
                                    <form class="user" method="post" action="login_cek.php">
                                    <br>
                                    <div class="form-group text-black">
                                        <label><b> Nama Departemen</B></label>
                                    <select class="form-control " name="departemen">
                                    <option disabled selected value="Nama Departemen">Pilih Departemen</option>
                                    <?php
                                    include 'koneksi.php';
                                    $query = "DELETE FROM sewa WHERE (MONTH(tanggal_sewa) = MONTH(CURDATE() - INTERVAL 1 MONTH) OR TIMESTAMPDIFF(DAY, tanggal_sewa, CURDATE()) > 30) AND (status = 'Dikonfirmasi' OR status = 'Ditolak')";
                                    mysqli_query($koneksi,$query);
                                    $sql = "SELECT DISTINCT departemen FROM user";
                                    $result = mysqli_query($koneksi, $sql);

            // Loop untuk menampilkan departemen sebagai pilihan dropdown
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['departemen'] . "'>" . $row['departemen'] . "</option>";
                                }
            // Tutup koneksi database
            
            ?>
                                    </select>
                                    </div>
                                        <div class="form-group">
                                        <label> <b>Password</b></label>
                                            <input type="password" class="form-control " name="password" placeholder="Masukan Password">
                                        </div>

                                        <input type="submit" value="LOGIN" class="btn btn-success  btn-block">
                                    </form>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>