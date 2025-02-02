<?php
require "fungsi_nilai.php";

// Ambil data siswa berdasarkan id_siswa yang dikirim via URL
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    // Ambil data siswa berdasarkan id_siswa, termasuk sakit, izin, alpha
    $siswa = query("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];

    // Ambil data nilai siswa beserta nama mata pelajaran
    $nilai = query("SELECT nilai.*, mapel.nama_mapel FROM nilai 
                    JOIN mapel ON nilai.id_mapel = mapel.id_mapel 
                    WHERE id_siswa = $id_siswa");
}

// Jika form disubmit, jalankan fungsi ubah
if (isset($_POST['submit'])) {
    if (ubah($_POST) >= 0) {
        echo "<script>
                alert('Data siswa dan nilai berhasil diubah!');
                document.location.href = 'siswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data siswa dan nilai gagal diubah!');
                document.location.href = 'ubah_siswa.php?id=$id_siswa';
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
        <h2>Ubah Data Siswa</h2>
        <button type="button" class="refresh-btn">
            <a href="ubah_siswa.php?id=<?= $siswa['id_siswa']; ?>">
                ↻
            </a>
        </button>
        <form action="" method="post">
            <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">

            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" required>
            </div>

            <div class="form-group">
                <label for="NISN">NISN</label>
                <input type="text" id="NISN" name="NISN" value="<?= $siswa['NISN']; ?>">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?= $siswa['alamat']; ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir']; ?>">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-Laki</option>
                    <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>

            <!-- Bagian untuk input nilai semua mata pelajaran -->
            <?php foreach ($nilai as $n) : ?>
                <div class="form-group">
                    <label for="nilai_<?= $n['id_mapel']; ?>">Nilai <?= $n['nama_mapel']; ?></label>
                    <input type="number" step="0.01" id="nilai_<?= $n['id_mapel']; ?>" name="nilai[<?= $n['id_mapel']; ?>]" value="<?= $n['nilai']; ?>" required>
                </div>
            <?php endforeach; ?>

            <!-- Bagian untuk absensi (sakit, izin, alpha) -->
            <div class="form-group">
                <label for="sakit">Absensi Sakit</label>
                <input type="number" id="sakit" name="sakit" value="<?= $siswa['sakit']; ?>">
            </div>

            <div class="form-group">
                <label for="izin">Absensi Izin</label>
                <input type="number" id="izin" name="izin" value="<?= $siswa['izin']; ?>">
            </div>

            <div class="form-group">
                <label for="alpha">Absensi Alpha</label>
                <input type="number" id="alpha" name="alpha" value="<?= $siswa['alpha']; ?>">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="save-btn">Simpan</button>
                <button type="button" class="back-btn">
                    <a href="siswa.php">Kembali</a>
                </button>
            </div>
        </form>
    </div>
</body>

</html>