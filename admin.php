<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Aspirasi Masuk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Aspirasi</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Pesan</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM aspirasi ORDER BY waktu DESC");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['nama']) . "</td>
                            <td>" . nl2br(htmlspecialchars($row['pesan'])) . "</td>
                            <td>" . $row['waktu'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada aspirasi.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
