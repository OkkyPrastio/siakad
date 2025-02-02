<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_nilai.php";

// Ambil semua siswa untuk dropdown
$siswa_list = query("SELECT * FROM siswa ORDER BY nama_siswa");

// Ambil semua mata pelajaran
$mapel_list = query("SELECT * FROM mapel");

// Jika form disubmit, jalankan fungsi tambah
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Nilai berhasil ditambahkan!');
                document.location.href = 'nilai.php';
            </script>";
    } else {
        echo "<script>
                alert('Nilai gagal ditambahkan!');
                document.location.href = 'tambah_nilai.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai Siswa</title>
    <link rel="stylesheet" href="../../style/form.css">
</head>

<body>
    <div class="container">
        <h2>Tambah Nilai Siswa</h2>
        <button type="button" class="refresh-btn" onclick="window.location.href='tambah_nilai.php';">
            ↻
        </button>

        <form action="" method="post">
            <div class="form-group">
                <label for="id_siswa">Nama Siswa</label>
                <select name="id_siswa" id="id_siswa" required>
                    <option value="" disabled selected>Pilih Siswa</option>
                    <?php foreach ($siswa_list as $siswa) : ?>
                        <option value="<?= $siswa['id_siswa']; ?>"><?= $siswa['nama_siswa']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Bagian untuk input nilai semua mata pelajaran -->
            <?php foreach ($mapel_list as $mapel) : ?>
                <div class="form-group">
                    <label for="nilai_<?= $mapel['id_mapel']; ?>"><?= $mapel['nama_mapel']; ?></label>
                    <input type="number" max="100" id="nilai_<?= $mapel['id_mapel']; ?>" name="nilai[<?= $mapel['id_mapel']; ?>]">
                </div>
            <?php endforeach; ?>

            <div class="form-group">
                <label for="sakit">Sakit</label>
                <input type="number" id="sakit" name="sakit">
            </div>

            <div class="form-group">
                <label for="izin">Izin</label>
                <input type="number" id="izin" name="izin">
            </div>

            <div class="form-group">
                <label for="alpha">Alpha</label>
                <input type="number" id="alpha" name="alpha">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="save-btn">Simpan</button>
                <button type="button" class="back-btn" onclick="window.location.href='nilai.php';">
                    Kembali
                </button>
            </div>
        </form>
    </div>
</body>

</html>