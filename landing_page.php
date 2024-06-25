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

    <style>
        .custom-card {
            background-color: #021899;
            color: white;
        }
        
        .custom-card h1,
        .custom-card h4,
        .custom-card a {
            color: white;
        }

        .custom-red {
            background-color: #CC0000;
            color: white;
        }
        .topbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px;
        }
        .logo-img {
            width: 200px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
            margin-left: auto; /* Push the logo to the right */
        }
    </style>

</head>

<body class="bg-gradient-light">

<div class="topbar">
        <img src="img/logo.png" alt="Logo" class="logo-img">
    </div>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah!";
        } else if ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    include('koneksi.php');
    $sql = "DELETE FROM sewa WHERE (MONTH(tanggal_sewa) = MONTH(CURDATE() - INTERVAL 1 MONTH) OR TIMESTAMPDIFF(DAY, tanggal_sewa, CURDATE()) > 30) AND (status = 'Dikonfirmasi' OR status = 'Ditolak')";
    mysqli_query($koneksi,$sql);
    ?>

<div class="container">
    <br>
    <br>
    
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4">
                <div class="card custom-card o-hidden border-0 shadow-lg" style="height: 550px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center">
                                        <div class="h5 mt-3 font-weight-bold text-white ">PANDUAN SINGKAT</div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Penambahan isi di bagian bawah card -->
                        <div class="mr-3 mx-3 text-white">
                            <p><ul>
                                <li>Klik Kalendar Reservasi untuk melihat jadwal ruang meeting</li>
                                <li>Anda bisa melakukan reservasi dengan <i>masuk</i> terlebih dahulu sesuai departemen.</li>
                                
                                <li>Pilih ruangan meeting dan isi formulir pemesanan sesuai kebutuhan.</li>
                                </ul>

                                </p>
                                <div class="text-center">
                    <img src="img/gm1.png" style="width: 60%;" alt="Gambar 1">
                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 ml-1 mb-4">
                <div class="card custom-card o-hidden border-0 shadow-lg" style="height: 320px;">
                    <a href="kalendar.php"> <div class="card-body p-0">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                <div class="mt-3 text-center">
                    <img src="img/kalender.png" style="width: 40%;" alt="Gambar 1">
                                </div>
                                   
                                    <div class="text-center">
                                    <div class="h6 mt-5 font-weight-bold text-white ">KALENDER RESERVASI <i>MEETING ROOM</I></div>
                                    <div class="mr-3 mx-4 mb-3 text-white text-center">
                                    <p>Klik disini untuk melihat jadwal meeting <br> di setiap ruangan</p>
                            
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Penambahan isi di bagian bawah card -->
                        
                    </div>
                    </div>
                    </a>
                </div><br><br>
                
                <div class="col-lg-12 mb-4">
                <div  class=" card custom-red o-hidden border-0 shadow-lg"  style="height: 180px;">
                   <a href="login.php"> <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                <div class="mt-3 text-center">
                    <img src="img/masuk.png" style="width: 20%;" alt="Gambar 1">
                                </div>
                                   
                                    <div class="text-center">
                                    <div class="h6 mt-3 font-weight-bold text-white ">MASUK</div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Penambahan isi di bagian bawah card -->
                
                    </div>
                    </a>
                    
                
                


               
                
                

       
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