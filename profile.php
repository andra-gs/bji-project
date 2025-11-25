<?php
session_start();
$user = $_SESSION["user"] ?? null;

// Jika user sudah login, set session bahwa dia sudah login dari halaman profil
if ($user) {
    $_SESSION["profil_logged"] = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Menggunakan satu file CSS global -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="profile-container">

    <?php if (!$user): ?>
        <div class="alert alert-warning text-center">
            Anda harus login dulu untuk mengakses halaman ini. <br>
            <a href="login.php" class="btn btn-warning mt-3">Login Sekarang</a>
        </div>
    
    <?php else: ?>

        <div class="profile-card shadow">

            <h3 class="text-center mb-3">Profil Pengguna</h3>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($user["nama"]) ?></li>
                <li class="list-group-item"><strong>NIS:</strong> <?= htmlspecialchars($user["nis"]) ?></li>
                <li class="list-group-item"><strong>Kelas:</strong> <?= htmlspecialchars($user["kelas"]) ?></li>
            </ul>

            <!-- Tombol hanya untuk admin -->
            <?php if (strtolower($user["nama"]) === "admin"): ?>
                <div class="text-center mb-3">
                    <a href="admin.php" class="btn btn-primary admin-btn">Masuk Halaman Admin</a>
                </div>
            <?php endif; ?>

            <form method="POST" action="logout.php" class="text-center">
                <button type="submit" class="btn btn-danger w-50">Logout</button>
            </form>

        </div>

    <?php endif; ?>

</div>

</body>
</html>
