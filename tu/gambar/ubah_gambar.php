<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_gambar.php"; // Koneksi ke database

// Proses pengubahan gambar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (ubah($_POST, $_FILES) > 0) {
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
            document.location.href = 'ubah_gambar.php';
        </script>
    ";
    }
}

// Ambil data gambar dari database
$id = $_GET['id']; // Ambil ID dari parameter URL
$gambar = query("SELECT * FROM gambar WHERE id_gambar = '$id'")[0]; // Ambil data gambar
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Gambar</title>
    <link rel="stylesheet" href="form-style.css"> <!-- Link ke CSS -->
</head>

<body>
    <div class="container">
        <h2>Form Ubah Gambar</h2>

        <!-- Tombol Refresh -->
        <div class="top-btn-container">
            <button type="button" class="refresh-btn" onclick="location.reload();">↻</button>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_gambar" value="<?php echo $gambar['id_gambar']; ?>"> <!-- ID Gambar -->
            <input type="hidden" name="nama_gambar_lama" value="<?php echo $gambar['nama_gambar']; ?>"> <!-- Gambar Lama -->
            <div class="form-group">
                <label for="file_gambar">Pilih Gambar Baru</label>
                <input type="file" id="file_gambar" name="gambar">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Gambar</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo $gambar['deskripsi']; ?></textarea>
            </div>
            <div class="bottom-btn-container">
                <button type="submit" class="save-btn">Simpan Perubahan</button>
                <button type="button" class="back-btn" onclick="window.location.href='gambar.php';">Kembali</button>
            </div>
        </form>
    </div>
</body>

</html>