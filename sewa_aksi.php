<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'phpmailer/src/Exception.php';
include 'phpmailer/src/PHPMailer.php';
include 'phpmailer/src/SMTP.php';
include 'koneksi.php';
include "header.php"; 

function tanggal_indonesia($dateString) {
    $months = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );

    $timestamp = strtotime($dateString);
    $day = date('d', $timestamp);
    $month = $months[date('n', $timestamp)];
    $year = date('Y', $timestamp);

    return $day . ' ' . $month . ' ' . $year;
}


$nama = $_POST['nama_akun'];
$nama_ruangan = $_POST['nama_ruangan'];
$nama_penyewa = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$keperluan = $_POST['keperluan'];
$departemen = $_POST['departemen'];

$tanggal_sewa =date('Y-m-d',strtotime($_POST['waktu_sewa']));  // Ubah format waktu
$jam_mulai = $_POST['jam_mulai']; 
$jam_selesai = $_POST['jam_selesai'];  // Ubah format waktu
$status = $_POST['status'];

// Cek apakah waktu sewa sudah ada yang sama
$sql_check = "SELECT COUNT(*) as count FROM sewa WHERE
tanggal_sewa = '$tanggal_sewa' AND
nama_ruangan = '$nama_ruangan' AND
((jam_mulai <= '$jam_mulai' AND jam_selesai > '$jam_mulai') OR
(jam_mulai < '$jam_selesai' AND jam_selesai >= '$jam_selesai'))";



$result_check = mysqli_query($koneksi, $sql_check);

if ($result_check) {
    $row_check = mysqli_fetch_assoc($result_check);
    $count = $row_check['count'];

    if ($count > 0) {
        echo "<script>window.alert('Penyewaan pada waktu tersebut untuk ruangan yang sama sudah terkonfirmasi. Silakan pilih waktu lain.')</script>";
        header("Location: gagal.php");
    } else {
        $sql = "INSERT INTO sewa (nama_akun, nama_ruangan, nama, no_hp, keperluan, departemen, tanggal_sewa, jam_mulai, jam_selesai, status)
        VALUES ('$nama', '$nama_ruangan', '$nama_penyewa', '$no_hp', '$keperluan', '$departemen', '$tanggal_sewa', '$jam_mulai', '$jam_selesai', '$status')";

        if (mysqli_query($koneksi, $sql)) {

            //PHPMAILER
            setlocale(LC_TIME, 'id_ID');
            $email_pengirim = 'bookingroomtn@gmail.com';            
            $nama_pengirim = 'Booking Room Traktor Nusantara';            
            $email_penerima = 'lintangadi51@gmail.com';   
            $subjek = 'Permintaan Booking Ruangan';            
            $pesan = 'Pengajuan booking ruangan '.$nama_ruangan.' atas nama '.$nama_penyewa.' untuk tanggal '.tanggal_indonesia($tanggal_sewa).' pukul '.$jam_mulai.' - '.$jam_selesai.' WIB.';            

            $mail = new PHPMailer(true);
            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';  // Ganti dengan server SMTP yang sesuai
            $mail->SMTPAuth = true;
            $mail->Username = $email_pengirim;  // Ganti dengan alamat email Anda
            $mail->Password = 'kcao mqpd cbqf wspu';  // Ganti dengan kata sandi email Anda
            $mail->SMTPSecure = 'ssl';  // Ganti sesuai kebutuhan, misalnya 'tls' atau 'none'
            $mail->Port = 465;  // Ganti dengan port SMTP yang sesuai
            // $mail->SMTPDebug = 2;

            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($email_penerima);
            // Tambahkan alamat email penerima tambahan jika diperlukan

            $mail->isHTML(true);
            $mail->Subject = $subjek;
            $mail->Body = $pesan;
            $send = $mail->send();
            if($send){
                header("Location: sukses_tambah.php?success=true");
                // echo "<script>window.location = 'sukses_tambah.php?success=true'</script>";
                exit();
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
                // echo "window.location = 'sukses_tambah.php?success=false'</script>";
                exit();
            }
            // header("Location: sukses_tambah.php?success=true");
            // exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }
} else {
    echo "Error: " . $sql_check . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>

<!-- Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sukses</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Data berhasil diupdate.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
