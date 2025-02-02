<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_jadwal.php";

// Ambil data jadwal berdasarkan ID
$id = $_GET['id'];
$jadwal = query("SELECT * FROM jadwal WHERE id_jadwal = $id")[0];

// Jika form submit, jalankan fungsi ubah
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Jadwal berhasil diubah!');
                document.location.href = 'jadwal.php';
            </script>";
    } else {
        echo "<script>
                alert('Jadwal gagal diubah!');
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Jadwal</title>
    <link rel="stylesheet" href="../../style/form.css">
</head>

<body>
    <div class="container">
        <div class="top-container">
            <h2>Ubah Jadwal</h2>
            <button type="button" class="refresh-btn">
                <a href="ubah_jadwal.php?id=<?= $jadwal['id_jadwal']; ?>">
                    ↻
                </a>
            </button>
        </div>
        <form action="" method="post">
            <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal']; ?>">

            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select id="id_kelas" name="id_kelas" required>
                    <?php
                    $kelas = query("SELECT * FROM kelas");
                    foreach ($kelas as $k) {
                        $selected = ($jadwal['id_kelas'] == $k['id_kelas']) ? 'selected' : '';
                        echo "<option value='" . $k['id_kelas'] . "' $selected>" . htmlspecialchars($k['nama_kelas']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hari">Hari</label>
                <select id="hari" name="hari" required>
                    <option value="Senin" <?= ($jadwal['hari'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                    <option value="Selasa" <?= ($jadwal['hari'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                    <option value="Rabu" <?= ($jadwal['hari'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                    <option value="Kamis" <?= ($jadwal['hari'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                    <option value="Jumat" <?= ($jadwal['hari'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                    <option value="Sabtu" <?= ($jadwal['hari'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" value="<?= $jadwal['jam_mulai']; ?>" required>
            </div>

            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" value="<?= $jadwal['jam_selesai']; ?>" required>
            </div>

            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select id="id_mapel" name="id_mapel" required>
                    <?php
                    $mapel = query("SELECT * FROM mapel");
                    foreach ($mapel as $m) {
                        $selected = ($jadwal['id_mapel'] == $m['id_mapel']) ? 'selected' : '';
                        echo "<option value='" . $m['id_mapel'] . "' $selected>" . htmlspecialchars($m['nama_mapel']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_guru">Guru</label>
                <select id="id_guru" name="id_guru" required>
                    <?php
                    $guru = query("SELECT * FROM guru");
                    foreach ($guru as $g) {
                        $selected = ($jadwal['id_guru'] == $g['id_guru']) ? 'selected' : '';
                        echo "<option value='" . $g['id_guru'] . "' $selected>" . htmlspecialchars($g['nama_guru']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="save-btn">Simpan</button>
                <button type="button" class="back-btn">
                    <a href="jadwal.php">Kembali</a>
                </button>
            </div>
        </form>
    </div>
</body>

</html>