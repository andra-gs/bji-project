<?php 
include 'db.php';
session_start();

// Cek apakah user sudah login dari halaman profil
if (!isset($_SESSION['profil_logged'])) {
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Akses Ditolak</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="center-page">
        <div class="denied-box">
            <h2>🚫 Akses Ditolak</h2>
            <p>Silakan login terlebih dahulu melalui halaman <a href="profile.php">Profil</a>.</p>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kirim Aspirasi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="center-page">

<div class="aspirasi-wrapper">

    <h2 class="asp-title">💬 Kirim Aspirasi Anda</h2>

    <p class="asp-subtitle">Suara Anda sangat berarti. Sampaikan aspirasi Anda secara sopan dan jelas.</p>

    <form action="kirim_aspirasi.php" method="POST" class="asp-form">

        <div class="floating-label">
            <textarea name="pesan" required></textarea>
            <label>Tulis aspirasi Anda...</label>
        </div>

        <button type="submit" class="asp-button">
            Kirim Aspirasi
        </button>
    </form>

</div>

</body>
</html>
