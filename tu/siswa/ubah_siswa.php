<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_siswa.php";

// Jika ada id_siswa yang dikirim via URL, ambil data siswa berdasarkan ID untuk diubah
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    $siswa = query("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];
}

// Jika form submit, jalankan fungsi ubah
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'siswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
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
        <div class="top-container">
            <h2>Ubah Data Siswa</h2>
            <button type="button" class="refresh-btn">
                <a href="ubah_siswa.php?id=<?= $siswa['id_siswa']; ?>">
                    ↻
                </a>
            </button>
        </div>
        <form action="" method="post">
            <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">

            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" value="<?= htmlspecialchars($siswa['nama_siswa']); ?>" required>
            </div>

            <div class="form-group">
                <label for="nipd">NIPD</label>
                <input type="number" id="nipd" name="nipd" value="<?= htmlspecialchars($siswa['NIPD']); ?>">
            </div>

            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="number" id="nisn" name="nisn" value="<?= htmlspecialchars($siswa['NISN']); ?>">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($siswa['tempat_lahir']); ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= htmlspecialchars($siswa['tanggal_lahir']); ?>">
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" id="agama" name="agama" value="<?= htmlspecialchars($siswa['agama']); ?>">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($siswa['alamat']); ?>">
            </div>

            <div class="form-group">
                <label for="rt">RT</label>
                <input type="number" id="rt" name="rt" value="<?= htmlspecialchars($siswa['rt']); ?>">
            </div>

            <div class="form-group">
                <label for="rw">RW</label>
                <input type="number" id="rw" name="rw" value="<?= htmlspecialchars($siswa['rw']); ?>">
            </div>

            <div class="form-group">
                <label for="dusun">Dusun</label>
                <input type="text" id="dusun" name="dusun" value="<?= htmlspecialchars($siswa['dusun']); ?>">
            </div>

            <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" id="kelurahan" name="kelurahan" value="<?= htmlspecialchars($siswa['kelurahan']); ?>">
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" value="<?= htmlspecialchars($siswa['kecamatan']); ?>">
            </div>

            <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" id="kode_pos" name="kode_pos" value="<?= htmlspecialchars($siswa['kode_pos']); ?>">
            </div>

            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" id="telp" name="telp" value="<?= htmlspecialchars($siswa['telp']); ?>">
            </div>

            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select id="id_kelas" name="id_kelas" required>
                    <?php
                    // Ambil data kelas
                    $kelas = query("SELECT * FROM kelas");
                    foreach ($kelas as $k) : ?>
                        <option value="<?= $k['id_kelas']; ?>" <?= ($siswa['id_kelas'] == $k['id_kelas']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($k['nama_kelas']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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