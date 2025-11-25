<?php 
session_start();

// Pastikan user login
if (!isset($_SESSION['profil_logged'])) {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aspirasi Berhasil Dikirim</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="center-page">

<div class="success-card">

    <div class="success-icon">✔</div>

    <h2>Aspirasi Berhasil Dikirim!</h2>
    <p>Terima kasih telah menyampaikan aspirasi Anda.</p>

    <a href="index.html" class="back-btn">Kembali ke Halaman Awal</a>

</div>

</body>
</html>
