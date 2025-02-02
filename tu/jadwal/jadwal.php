<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_jadwal.php";

// Inisialisasi variabel pencarian
$keyword = '';

// Ambil data jadwal dengan pencarian (jika ada)
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $jadwal = query("SELECT jadwal.*, mapel.nama_mapel, guru.nama_guru, kelas.nama_kelas 
                    FROM jadwal 
                    JOIN mapel ON jadwal.id_mapel = mapel.id_mapel 
                    JOIN guru ON jadwal.id_guru = guru.id_guru 
                    JOIN kelas ON jadwal.id_kelas = kelas.id_kelas 
                    WHERE mapel.nama_mapel LIKE '%$keyword%' 
                    OR guru.nama_guru LIKE '%$keyword%' 
                    OR kelas.nama_kelas LIKE '%$keyword%'
                    
                    ORDER BY kelas.nama_kelas, 
                    FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), 
                    jam_mulai ASC");
} else {
    $jadwal = query("SELECT jadwal.*, mapel.nama_mapel, guru.nama_guru, kelas.nama_kelas 
                FROM jadwal 
                JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
                JOIN guru ON jadwal.id_guru = guru.id_guru
                JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
                ORDER BY kelas.nama_kelas, 
                    FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), 
                    jam_mulai ASC");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    <link rel="stylesheet" href="../../style/main-style.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="control">
                <!-- Tombol Tambah Jadwal -->
                <button class="add-btn" onclick="window.location.href='tambah_jadwal.php';">
                    <a href="tambah_jadwal.php">✙ Tambah</a>
                </button>

                <!-- Input Pencarian -->
                <input type="text" class="search-input" name="keyword" value="<?= htmlspecialchars($keyword); ?>" placeholder="Cari jadwal...">
                <button type="submit" class="search-btn">Cari</button>

                <!-- Tombol Refresh -->
                <button type="button" class="refresh-btn" onclick="window.location.href='jadwal.php';">↻</button>
            </div>
        </form>

        <div class="table-wrapper">
            <table>
                <tr class="header-row">
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th class="action-header"></th>
                </tr>

                <?php $nomor = 1; ?>
                <?php foreach ($jadwal as $j) : ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= htmlspecialchars($j["nama_mapel"]); ?></td>
                        <td><?= htmlspecialchars($j["nama_guru"]); ?></td>
                        <td><?= htmlspecialchars($j["nama_kelas"]); ?></td>
                        <td><?= htmlspecialchars($j["hari"]); ?></td>
                        <td><?= htmlspecialchars($j["jam_mulai"]); ?></td>
                        <td><?= htmlspecialchars($j["jam_selesai"]); ?></td>
                        <td class="action">
                            <button class="edit-btn" onclick="window.location.href='ubah_jadwal.php?id=<?= $j['id_jadwal']; ?>';">✎</button>
                            <button class="delete-btn" onclick="if(confirm('Hapus jadwal?')) window.location.href='hapus_jadwal.php?id_jadwal=<?= $j['id_jadwal']; ?>';">✖</button>

                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>