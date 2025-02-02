<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_guru.php";

// Jika form submit, jalankan fungsi tambah
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'guru.php';
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
    <title>Tambah Data Guru</title>
    <link rel="stylesheet" href="../../style/form.css">
</head>

<body>
    <div class="container">
        <div class="top-container">
            <h2>Tambah Data Guru</h2>
            <button type="button" class="refresh-btn">
                <a href="tambah_guru.php">
                    ↻
                </a>
            </button>
        </div>
        <form action="" method="post">

            <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <input type="text" id="nama_guru" name="nama_guru" required>
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
                <label for="NIP">NIP</label>
                <input type="text" id="NIP" name="NIP">
            </div>

            <div class="form-group">
                <label for="status_pegawai">Status Pegawai</label>
                <input type="text" id="status_pegawai" name="status_pegawai">
            </div>

            <div class="form-group">
                <label for="jenis_ptk">Jenis PTK</label>
                <input type="text" id="jenis_ptk" name="jenis_ptk">
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" id="agama" name="agama">
            </div>

            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" id="telp" name="telp">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="save-btn">Simpan</button>
                <button type="button" class="back-btn">
                    <a href="guru.php">
                        Kembali
                    </a>
                </button>
            </div>
        </form>
    </div>
</body>

</html>