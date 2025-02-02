<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_guru.php"; // Koneksi database

// Cek apakah ada parameter 'id' yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id_guru = $_GET['id'];

    // Siapkan query dengan prepared statement untuk menghindari SQL Injection
    $stmt = mysqli_prepare($conn, "DELETE FROM guru WHERE id_guru = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id_guru);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        // Jika penghapusan berhasil, redirect ke halaman guru
        echo "<script>
            alert('Data guru berhasil dihapus');
            document.location.href = 'guru.php';
        </script>";
    } else {
        // Jika penghapusan gagal, tampilkan pesan error
        echo "<script>
            alert('Data guru gagal dihapus');
            document.location.href = 'guru.php';
        </script>";
    }

    mysqli_stmt_close($stmt);
} else {
    // Jika tidak ada 'id' di URL, redirect ke halaman guru
    echo "<script>
        alert('Tidak ada data yang dipilih');
        document.location.href = 'guru.php';
    </script>";
}
