<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_nilai.php";

// Tangkap id_siswa dari URL
$id_siswa = $_GET["id"];

// Panggil fungsi hapus
if (hapus($id_siswa) > 0) {
    echo "<script>
            alert('Data nilai berhasil dihapus!');
            document.location.href = 'nilai.php';
        </script>";
} else {
    echo "<script>
            alert('Data nilai gagal dihapus!');
            document.location.href = 'nilai.php';
        </script>";
}
