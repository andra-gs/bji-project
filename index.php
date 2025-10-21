<?php include 'db.php'; ?>

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
