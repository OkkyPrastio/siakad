<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_siswa.php"; // Sesuaikan dengan nama file fungsi yang Anda gunakan

// Ambil data kelas untuk dropdown
$kelas = query("SELECT * FROM kelas");

// Default: Ambil data siswa kelas 1 jika tidak ada kelas yang dipilih
$selected_kelas = isset($_POST['kelas']) ? $_POST['kelas'] : 1; // Menggunakan kelas 1 sebagai default
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

// Query untuk mengambil data siswa sesuai kelas dan keyword
if (!empty($keyword)) {
    // Jika ada pencarian kata kunci
    $siswa = query("SELECT siswa.*, kelas.nama_kelas
                    FROM siswa 
                    JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
                    WHERE (siswa.nama_siswa LIKE '%$keyword%' OR siswa.NISN LIKE '%$keyword%') 
                    AND siswa.id_kelas = $selected_kelas ORDER BY siswa.id_kelas, siswa.nama_siswa");
} else {
    // Jika tidak ada kata kunci, tampilkan berdasarkan kelas saja
    $siswa = query("SELECT siswa.*, kelas.nama_kelas
                    FROM siswa 
                    JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
                    WHERE siswa.id_kelas = $selected_kelas ORDER BY siswa.id_kelas, siswa.nama_siswa");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="../../style/main-style.css">
</head>

<body>
    <div class="container">

        <form action="" method="post">

            <div class="control">
                <button class="add-btn">
                    <a href="tambah_siswa.php">
                        ✙ Tambah
                    </a>
                </button>

                <!-- Input pencarian -->
                <input type="text" class="search-input" name="keyword" value="<?= htmlspecialchars($keyword); ?>" placeholder="Masukkan kata...">
                <button type="submit" class="search-btn">Cari</button>

                <!-- Tombol refresh -->
                <button class="refresh-btn" type="button" onclick="window.location.href='siswa.php'">↻</button>

                <!-- Dropdown untuk memilih kelas -->
                <select class="select-option" name="kelas" onchange="this.form.submit()">
                    <?php foreach ($kelas as $k): ?>
                        <option value="<?= $k['id_kelas']; ?>" <?= ($selected_kelas == $k['id_kelas']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($k['nama_kelas']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>

        <div class="table-wrapper">
            <table>
                <tr class="header-row">
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NIPD</th>
                    <th>NISN</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Dusun</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kode Pos</th>
                    <th>Telp</th>
                    <th>Kelas</th>
                    <th class="action-header">Aksi</th>
                </tr>

                <?php $nomor = 1; ?>
                <?php if (empty($siswa)): ?>
                    <tr>
                        <td colspan="18" style="text-align: center;">Data tidak ditemukan</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($siswa as $s) : ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td style="text-align: left;"><?= htmlspecialchars($s["nama_siswa"]); ?></td>
                            <td><?= htmlspecialchars($s["NIPD"]); ?></td>
                            <td><?= htmlspecialchars($s["NISN"]); ?></td>
                            <td><?= htmlspecialchars($s["tempat_lahir"]); ?></td>
                            <td><?= htmlspecialchars($s["tanggal_lahir"]); ?></td>
                            <td><?= htmlspecialchars($s["jenis_kelamin"] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
                            <td><?= htmlspecialchars($s["agama"]); ?></td>
                            <td><?= htmlspecialchars($s["alamat"]); ?></td>
                            <td><?= htmlspecialchars($s["rt"]); ?></td>
                            <td><?= htmlspecialchars($s["rw"]); ?></td>
                            <td><?= htmlspecialchars($s["dusun"]); ?></td>
                            <td><?= htmlspecialchars($s["kelurahan"]); ?></td>
                            <td><?= htmlspecialchars($s["kecamatan"]); ?></td>
                            <td><?= htmlspecialchars($s["kode_pos"]); ?></td>
                            <td><?= htmlspecialchars($s["telp"]); ?></td>
                            <td><?= htmlspecialchars($s["nama_kelas"]); ?></td>
                            <td class=" action">
                                <button class="edit-btn" onclick="window.location.href='ubah_siswa.php?id=<?= $s['id_siswa']; ?>';">✎</button>
                                <button class="delete-btn" onclick="if(confirm('Hapus data siswa?')) window.location.href='hapus_siswa.php?id=<?= $s['id_siswa']; ?>';">✖</button>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div> <!-- table-wrapper -->
    </div> <!-- container -->
</body>

</html>