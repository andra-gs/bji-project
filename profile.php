<?php
session_start();
$user = $_SESSION["user"] ?? null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="profile-card">
    <?php if (!$user): ?>
        <div class="alert alert-warning text-center">
            Anda harus login dulu untuk mengakses halaman ini. <br>
            <a href="login.php" class="btn btn-warning mt-3">Login Sekarang</a>
        </div>
    <?php else: ?>
        <h3 class="mb-3 text-center">Profil Pengguna</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($user["nama"]) ?></li>
            <li class="list-group-item"><strong>NIS:</strong> <?= htmlspecialchars($user["nis"]) ?></li>
            <li class="list-group-item"><strong>Kelas:</strong> <?= htmlspecialchars($user["kelas"]) ?></li>
        </ul>
        <form method="POST" action="logout.php" class="mt-4 text-center">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
