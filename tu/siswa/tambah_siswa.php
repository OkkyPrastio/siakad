<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_siswa.php";

// Jika form disubmit, jalankan fungsi tambah
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'siswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="../../style/form.css">
</head>

<body>
    <div class="container">
        <div class="top-container">
            <h2>Tambah Data Siswa</h2>
            <button type="button" class="refresh-btn">
                <a href="tambah_siswa.php">
                    ↻
                </a>
            </button>
        </div>
        <form action="" method="post">

            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" required>
            </div>

            <div class="form-group">
                <label for="nipd">NIPD</label>
                <input type="number" id="nipd" name="nipd">
            </div>

            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="number" id="nisn" name="nisn">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir">
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" id="agama" name="agama">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat">
            </div>

            <div class="form-group">
                <label for="rt">RT</label>
                <input type="number" id="rt" name="rt">
            </div>

            <div class="form-group">
                <label for="rw">RW</label>
                <input type="number" id="rw" name="rw">
            </div>

            <div class="form-group">
                <label for="dusun">Dusun</label>
                <input type="text" id="dusun" name="dusun">
            </div>

            <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" id="kelurahan" name="kelurahan">
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan">
            </div>

            <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" id="kode_pos" name="kode_pos">
            </div>

            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" id="telp" name="telp">
            </div>

            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select id="id_kelas" name="id_kelas" required>
                    <?php
                    // Ambil data kelas
                    $kelas = query("SELECT * FROM kelas");
                    foreach ($kelas as $k) : ?>
                        <option value="<?= $k['id_kelas']; ?>">
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