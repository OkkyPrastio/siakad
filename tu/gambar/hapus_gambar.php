<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_gambar.php";

$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('PROSES HAPUS BERHASIL');
            document.location.href = 'gambar.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('PROSES HAPUS GAGAL');
            document.location.href = 'gambar.php';
        </script>
    ";
}
