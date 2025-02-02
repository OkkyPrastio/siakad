<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_nilai.php";

// Tangkap kata kunci pencarian
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

// Tangkap kelas yang dipilih
$id_kelas = isset($_POST['id_kelas']) ? $_POST['id_kelas'] : '';

// Tangkap metode pengurutan yang dipilih (by total_nilai atau nama_siswa)
$sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'nama'; // Default pengurutan nama

// Ambil data hasil nilai, dengan filter pencarian dan kelas
$hasil_nilai = hasil_nilai($keyword, $id_kelas);
$mapel = query("SELECT * FROM mapel");
$kelas = get_kelas(); // Ambil semua kelas

// Sortir data berdasarkan pilihan user
if ($sort_by == 'total_nilai') {
    usort($hasil_nilai, function ($a, $b) {
        $total_a = array_sum($a['nilai_mapel']);
        $total_b = array_sum($b['nilai_mapel']);
        return $total_b <=> $total_a; // Urutkan dari yang terbesar ke yang terkecil
    });
} else {
    // Urutkan berdasarkan nama secara default
    usort($hasil_nilai, function ($a, $b) {
        return strcmp($a['nama_siswa'], $b['nama_siswa']);
    });
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai</title>
    <link rel="stylesheet" href="../../style/main-style.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="control">
                <button class="add-btn">
                    <a href="tambah_nilai.php">✙ Tambah</a>
                </button>
                <input type="text" class="search-input" name="keyword" placeholder="Masukkan nama siswa..." value="<?= htmlspecialchars($keyword); ?>">
                <button type="submit" class="search-btn">Cari</button>
                <button class="refresh-btn" onclick="window.location.href='nilai.php';">↻</button>

                <select class="select-option" name="id_kelas" onchange="this.form.submit()">
                    <option value="">Semua Kelas</option>
                    <?php foreach ($kelas as $row): ?>
                        <option value="<?= $row['id_kelas']; ?>" <?= ($row['id_kelas'] == $id_kelas) ? 'selected' : ''; ?>>
                            <?= $row['nama_kelas']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select class="select-option" name="sort_by" onchange="this.form.submit()">
                    <option value="nama" <?= ($sort_by == 'nama') ? 'selected' : ''; ?>>Urut Nama</option>
                    <option value="total_nilai" <?= ($sort_by == 'total_nilai') ? 'selected' : ''; ?>>Urut Nilai</option>
                </select>
            </div>
        </form>

        <div class="table-wrapper">
            <table>
                <tr class="header-row">
                    <th>No</th>
                    <th>Nama</th>
                    <?php foreach ($mapel as $row): ?>
                        <th><?= $row['nama_mapel']; ?></th>
                    <?php endforeach; ?>
                    <th>Total Nilai</th>
                    <th>Rata-rata Nilai</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alpha</th>
                    <th class="action-header"></th>
                </tr>

                <?php
                $nomor = 1;
                foreach ($hasil_nilai as $siswa):
                    // Siapkan array untuk menyimpan nilai per mapel
                    $nilai_mapel = [];
                ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td style="text-align: left;"><?= $siswa['nama_siswa']; ?></td>

                        <?php foreach ($mapel as $mapel_row): ?>
                            <?php
                            // Ambil nilai untuk mapel tertentu
                            $nilai = isset($siswa['nilai_mapel'][$mapel_row['nama_mapel']]) ? $siswa['nilai_mapel'][$mapel_row['nama_mapel']] : '0.00';
                            ?>
                            <td><?= $nilai; ?></td>
                        <?php endforeach; ?>

                        <?php
                        // Hitung total nilai dan rata-rata
                        $total_nilai = array_sum($siswa['nilai_mapel']);
                        $rata_rata_nilai = count($siswa['nilai_mapel']) > 0 ? $total_nilai / count($siswa['nilai_mapel']) : 0;
                        ?>
                        <td><?= number_format($total_nilai, 2); ?></td>
                        <td><?= number_format($rata_rata_nilai, 2); ?></td>
                        <td><?= $siswa['sakit']; ?></td>
                        <td><?= $siswa['izin']; ?></td>
                        <td><?= $siswa['alpha']; ?></td>
                        <td class="action">
                            <button class="edit-btn" onclick="window.location.href='ubah_nilai.php?id=<?= $siswa['id_siswa']; ?>';">✎</button>
                            <button class="delete-btn" onclick="if(confirm('Hapus data siswa?')) window.location.href='hapus_nilai.php?id=<?= $siswa['id_siswa']; ?>';">✖</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>