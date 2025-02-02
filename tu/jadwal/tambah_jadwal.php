<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_jadwal.php"; // Sesuaikan dengan fungsi yang digunakan

// Jika form disubmit, jalankan fungsi tambah
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Jadwal berhasil ditambahkan!');
                document.location.href = 'jadwal.php'; // Ganti sesuai halaman tujuan setelah simpan
            </script>";
    } else {
        echo "<script>
                alert('Jadwal gagal ditambahkan!');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link rel="stylesheet" href="../../style/form.css"> <!-- Sesuaikan dengan stylesheet -->
</head>

<body>
    <div class="container">
        <h2>Tambah Jadwal</h2>
        <button type="button" class="refresh-btn">
            <a href="tambah_jadwal.php">
                ↻
            </a>
        </button>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select id="id_mapel" name="id_mapel" required>
                    <?php
                    // Ambil data mata pelajaran dari database
                    $mapel = query("SELECT * FROM mapel");
                    foreach ($mapel as $m) {
                        echo "<option value='{$m['id_mapel']}'>{$m['nama_mapel']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_guru">Guru</label>
                <select id="id_guru" name="id_guru" required>
                    <?php
                    // Ambil data guru dari database
                    $guru = query("SELECT * FROM guru");
                    foreach ($guru as $g) {
                        echo "<option value='{$g['id_guru']}'>{$g['nama_guru']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select id="id_kelas" name="id_kelas" required>
                    <?php
                    // Ambil data kelas dari database
                    $kelas = query("SELECT * FROM kelas");
                    foreach ($kelas as $k) {
                        echo "<option value='{$k['id_kelas']}'>{$k['nama_kelas']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hari">Hari</label>
                <select id="hari" name="hari" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" class="select-time" id="jam_mulai" name="jam_mulai" required>
            </div>
            <br>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" class="select-time" id="jam_selesai" name="jam_selesai" required>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" name="submit" class="save-btn">Simpan</button>
                <button type="button" class="back-btn">
                    <a href="jadwal.php">Kembali</a> <!-- Sesuaikan halaman kembalinya -->
                </button>
            </div>
        </form>
    </div>
</body>

</html>