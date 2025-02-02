<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require 'fungsi_jadwal.php'; // Import fungsi hapus

// Cek apakah parameter id_jadwal ada di URL
if (isset($_GET['id_jadwal'])) {
    $id_jadwal = $_GET['id_jadwal'];

    // Panggil fungsi hapus
    if (hapus($id_jadwal) > 0) {
        echo "<script>
                alert('Jadwal berhasil dihapus!');
                document.location.href = 'jadwal.php'; // Redirect ke halaman jadwal setelah berhasil hapus
            </script>";
    } else {
        echo "<script>
                alert('Jadwal gagal dihapus!');
                document.location.href = 'jadwal.php'; // Redirect ke halaman jadwal meskipun gagal
            </script>";
    }
} else {
    echo "<script>
            alert('ID Jadwal tidak ditemukan!');
            document.location.href = 'jadwal.php'; // Redirect ke halaman jadwal jika id_jadwal tidak ada
        </script>";
}
