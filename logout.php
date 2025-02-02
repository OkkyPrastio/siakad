<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy(); // Hapus semua data sesi
    header("Location: index.php"); // Redirect ke halaman login jika logout berhasil
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Logout</h2>
        <p>Apakah Anda yakin ingin logout?</p>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>

            <br><br>
            <!-- Kembali ke halaman sebelumnya jika logout dibatalkan -->
            <button type="button" class="button-logout" onclick="history.back()">Batal</button>
        </form>
    </div>
</body>

</html>