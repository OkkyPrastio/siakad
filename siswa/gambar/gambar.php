<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../index.php");
    exit;
}

require 'fungsi_gambar.php';
$gambar = query("SELECT * FROM gambar");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Gambar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- Kontainer Galeri Gambar -->
        <div class="gallery-container">
            <?php foreach ($gambar as $g): ?>
                <div class="gallery-item">
                    <!-- Membungkus gambar dengan link untuk membuka gambar penuh -->
                    <a href="uploads/<?= htmlspecialchars($g['nama_gambar']); ?>" target="_blank">
                        <img src="uploads/<?= htmlspecialchars($g['nama_gambar']); ?>" alt="Gambar">
                    </a>

                    <div class="description">
                        <?= htmlspecialchars($g['deskripsi']); ?>
                    </div><br>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>