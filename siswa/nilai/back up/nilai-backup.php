<?php
require "fungsi_siswa.php";

$siswa = query("SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="../style/main-style.css">
</head>

<body>
    <div class="container">
        <h2></h2>

        <form action="" method="post">
            <div class="control">
                <button class="add-btn">
                    ✙
                </button>
                <input type="text" class="search-input" name="keyword" placeholder="Masukkan kata...">
                <button type="submit" class="search-btn">Cari</button>
                <button class="refresh-btn">↻</button>
            </div>
        </form>

        <div class="table-wrapper">
            <table>
                <tr class="header-row">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>JK</th>
                    <th>kelas</th>
                    <th class="action-header"></th>
                </tr>

                <?php $nomor = 1; ?>
                <?php foreach ($siswa as $siswa) : ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $siswa["nama"]; ?></td>
                        <td><?= $siswa["NISN"]; ?></td>
                        <td><?= $siswa["alamat"]; ?></td>
                        <td><?= $siswa["tanggal_lahir"]; ?></td>
                        <td><?= $siswa["jenis_kelamin"]; ?></td>
                        <td><?= $siswa["id_kelas"]; ?></td>
                        <td class="action">
                            <button class="edit-btn">
                                <a href="ubah_siswa.php?id=<?= $siswa['id_siswa']; ?>">✎</a>
                            </button>
                            <button class="delete-btn">
                                <a href="hapus_siswa.php?id=<?= $siswa['id_siswa']; ?>" onclick="return confirm('Hapus data siswa?');">✖</a>
                            </button>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach; ?>
            </table>
        </div> <!-- table-wrapper -->
    </div> <!-- container -->
</body>

</html>