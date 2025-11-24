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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kirim Aspirasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Kirim Aspirasi Anda</h1>

<?php
// Proses penyimpanan aspirasi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];

    if ($nama && $pesan) {
        $stmt = $conn->prepare("INSERT INTO aspirasi (nama, pesan) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $pesan);
        $stmt->execute();

        echo "<p class='success'>Aspirasi berhasil dikirim!</p>";
    } else {
        echo "<p class='error'>Nama dan aspirasi wajib diisi.</p>";
    }
}
?>

<form method="POST" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>

    <label>Aspirasi:</label><br>
    <textarea name="pesan" rows="5" required></textarea><br>

    <button type="submit">Kirim</button>
</form>

</body>
</html>
