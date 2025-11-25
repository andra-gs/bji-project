<?php 
include 'db.php';
session_start();

// Cek apakah user sudah login dari halaman profil
if (!isset($_SESSION['profil_logged'])) {
    // Jika belum login, tampilkan pesan dan hentikan halaman
    ?>
    
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Akses Ditolak</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Anda belum login!</h2>
        <p>Silakan login terlebih dahulu melalui halaman <a href="profile.php">Profil</a>.</p>
    </body>
    </html>

    <?php
    exit(); // hentikan supaya HTML dashboard tidak ikut tampil
}
?>
<?php
$pengirim = $_SESSION["user"]["nama"]; // nama diambil dari akun login
$pesan    = $_POST['pesan'];

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO aspirasi (pengirim, pesan) VALUES (?, ?)");
$stmt->bind_param("ss", $pengirim, $pesan);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect kembali
header("Location: sukses_kirim.php");
exit;

?>
