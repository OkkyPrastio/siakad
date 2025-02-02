<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_guru.php";

// Inisialisasi variabel pencarian
$keyword = '';

// Ambil data guru dengan pencarian (jika ada)
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $guru = query("SELECT * FROM guru WHERE nama_guru LIKE '%$keyword%' OR email LIKE '%$keyword%' ORDER BY nama_guru");
} else {
    $guru = query("SELECT * FROM guru ORDER BY nama_guru");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="../../style/main-style.css">
</head>

<body>
    <div class="container">

        <form action="" method="post">
            <div class="control">
                <!-- Input Pencarian -->
                <input type="text" class="search-input" name="keyword" value="<?= htmlspecialchars($keyword); ?>" placeholder="Masukkan kata...">
                <button type="submit" class="search-btn">Cari</button>

                <!-- Tombol Refresh (mereset pencarian) -->
                <button type="button" class="refresh-btn" onclick="window.location.href='guru.php';">↻</button>
            </div>
        </form>

        <div class="table-wrapper">
            <table>
                <tr class="header-row">
                    <th>No</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>NIP</th>
                    <th>Status</th>
                    <th>Jenis</th>
                    <th>Agama</th>
                    <th>Telp</th>
                    <th>Email</th>
                </tr>

                <?php $nomor = 1; ?>
                <?php foreach ($guru as $g) : ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td style="text-align: left;"><?= htmlspecialchars($g["nama_guru"]); ?></td>
                        <td><?= htmlspecialchars($g["jenis_kelamin"]); ?></td>
                        <td><?= htmlspecialchars($g["tempat_lahir"]); ?></td>
                        <td><?= htmlspecialchars($g["tanggal_lahir"]); ?></td>
                        <td><?= htmlspecialchars($g["NIP"]); ?></td>
                        <td><?= htmlspecialchars($g["status_pegawai"]); ?></td>
                        <td><?= htmlspecialchars($g["jenis_ptk"]); ?></td>
                        <td><?= htmlspecialchars($g["agama"]); ?></td>
                        <td><?= htmlspecialchars($g["telp"]); ?></td>
                        <td><?= htmlspecialchars($g["email"]); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach; ?>
            </table>
        </div> <!-- table-wrapper -->
    </div> <!-- container -->
</body>

</html>