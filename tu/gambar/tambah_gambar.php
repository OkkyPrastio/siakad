<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_gambar.php";

// Proses penambahan gambar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (tambah($_POST, $_FILES) > 0) {
        echo "
        <script>
            alert('PROSES BERHASIL');
            document.location.href = 'gambar.php';
        </script>
    ";
    } else {
        echo "
        <script>
            alert('PROSES GAGAL');
            document.location.href = 'tambah_gambar.php';
        </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gambar</title>
    <link rel="stylesheet" href="form-style.css"> <!-- Link ke CSS -->
</head>

<body>
    <div class="container">
        <h2>Form Tambah Gambar</h2>

        <!-- Tombol Refresh -->
        <div class="top-btn-container">
            <button type="button" class="refresh-btn" onclick="location.reload();">↻</button>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file_gambar">Pilih Gambar</label>
                <input type="file" id="file_gambar" name="gambar" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Gambar</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            <div class="bottom-btn-container">
                <button type="submit" class="save-btn">Tambah Gambar</button>
                <button type="button" class="back-btn" onclick="window.location.href='gambar.php';">Kembali</button>
            </div>
        </form>
    </div>
</body>

</html>