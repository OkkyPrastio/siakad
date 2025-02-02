<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_nilai.php";

// Ambil data siswa berdasarkan id_siswa yang dikirim via URL
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    // Ambil data siswa berdasarkan id_siswa, termasuk sakit, izin, alpha
    $siswa = query("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];

    // Ambil semua mata pelajaran, beserta nilai siswa (jika ada) menggunakan LEFT JOIN
    $nilai = query("SELECT DISTINCT mapel.id_mapel, mapel.nama_mapel, IFNULL(nilai.nilai, 0) AS nilai 
                FROM mapel 
                LEFT JOIN nilai ON mapel.id_mapel = nilai.id_mapel AND nilai.id_siswa = $id_siswa");
}

// Jika form disubmit, jalankan fungsi ubah
if (isset($_POST['submit'])) {
    if (ubah($_POST) >= 0) {
        echo "<script>
                alert('Nilai siswa berhasil diubah!');
                document.location.href = 'nilai.php';
            </script>";
    } else {
        echo "<script>
                alert('Nilai siswa gagal diubah!');
                document.location.href = 'ubah_nilai.php?id=$id_siswa';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Siswa</title>
    <link rel="stylesheet" href="../../style/form.css">
</head>

<body>
    <div class="container">
        <h2>Ubah Nilai Siswa</h2>
        <button type="button" class="refresh-btn">
            <a href="ubah_nilai.php?id=<?= $siswa['id_siswa']; ?>">
                ↻
            </a>
        </button>
        <form action="" method="post">
            <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">

            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" readonly>
            </div>

            <!-- Bagian untuk input nilai semua mata pelajaran -->
            <?php foreach ($nilai as $n) : ?>
                <div class="form-group">
                    <label for="nilai_<?= $n['id_mapel']; ?>"><?= $n['nama_mapel']; ?></label>
                    <input type="number" max="100" id="nilai_<?= $n['id_mapel']; ?>" name="nilai[<?= $n['id_mapel']; ?>]" value="<?= number_format($n['nilai'], 2, '.', ''); ?>">
                </div>
            <?php endforeach; ?>

            <div class="form-group">
                <label for="sakit">Sakit</label>
                <input type="number" id="sakit" name="sakit" value="<?= $siswa['sakit']; ?>">
            </div>

            <div class="form-group">
                <label for="izin">Izin</label>
                <input type="number" id="izin" name="izin" value="<?= $siswa['izin']; ?>">
            </div>

            <div class="form-group">
                <label for="alpha">Alpha</label>
                <input type="number" id="alpha" name="alpha" value="<?= $siswa['alpha']; ?>">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="save-btn">Simpan</button>
                <button type="button" class="back-btn">
                    <a href="nilai.php">Kembali</a>
                </button>
            </div>
        </form>

    </div>
</body>

</html>