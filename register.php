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
        <option value="">-- Pilih Kelas --</option>

<option value="X tjkt 1">X tjkt 1</option>
<option value="X tjkt 2">X tjkt 2</option>
<option value="X tjkt 3">X tjkt 3</option>
<option value="X tjkt 4">X tjkt 4</option>

<option value="X tav 1">X tav 1</option>
<option value="X tav 2">X tav 2</option>
<option value="X tav 3">X tav 3</option>

<option value="X tsm 1">X tsm 1</option>
<option value="X tsm 2">X tsm 2</option>
<option value="X tsm 3">X tsm 3</option>

<option value="X ak 1">X ak 1</option>
<option value="X ak 2">X ak 2</option>
<option value="X ak 3">X ak 3</option>

<option value="X mp 1">X mp 1</option>
<option value="X mp 2">X mp 2</option>
<option value="X mp 3">X mp 3</option>
<option value="X mp 4">X mp 4</option>

<option value="XI tjkt 1">XI tjkt 1</option>
<option value="XI tjkt 2">XI tjkt 2</option>
<option value="XI tjkt 3">XI tjkt 3</option>
<option value="XI tjkt 4">XI tjkt 4</option>

<option value="XI tav 1">XI tav 1</option>
<option value="XI tav 2">XI tav 2</option>
<option value="XI tav 3">XI tav 3</option>

<option value="XI tsm 1">XI tsm 1</option>
<option value="XI tsm 2">XI tsm 2</option>
<option value="XI tsm 3">XI tsm 3</option>

<option value="XI ak 1">XI ak 1</option>
<option value="XI ak 2">XI ak 2</option>
<option value="XI ak 3">XI ak 3</option>

<option value="XI mp 1">XI mp 1</option>
<option value="XI mp 2">XI mp 2</option>
<option value="XI mp 3">XI mp 3</option>
<option value="XI mp 4">XI mp 4</option>

<option value="XII tkjt 1">XII tkjt 1</option>
<option value="XII tkjt 2">XII tkjt 2</option>
<option value="XII tkjt 3">XII tkjt 3</option>
<option value="XII tkjt 4">XII tkjt 4</option>

<option value="XII tav 1">XII tav 1</option>
<option value="XII tav 2">XII tav 2</option>
<option value="XII tav 3">XII tav 3</option>

<option value="XII tsm 1">XII tsm 1</option>
<option value="XII tsm 2">XII tsm 2</option>
<option value="XII tsm 3">XII tsm 3</option>

    </select><br>
    <button type="submit">Daftar</button>
</form>
