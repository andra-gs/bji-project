<?php
require 'db.php';

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $password = $_POST["password"];
    $kelas = $_POST["kelas"];

    if (!$nama || !$nis || !$password || !$kelas) {
        $error = "Semua field harus diisi.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (nama, nis, password, kelas) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $nis, $hashed, $kelas);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            $error = "NIS sudah terdaftar.";
        }
        $stmt->close();
    }
}
?>

<!-- FORM HTML -->
 <!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registrasi</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
<form method="POST">
    <input name="nama" placeholder="Nama" required><br>
    <input name="nis" placeholder="NIS" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <select name="kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
    </select><br>
    <button type="submit">Daftar</button>
</form>
