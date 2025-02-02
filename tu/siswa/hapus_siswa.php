<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_siswa.php";

// Cek apakah ada parameter 'id' yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];

    // Query untuk menghapus data siswa berdasarkan id_siswa
    $query = "DELETE FROM siswa WHERE id_siswa = $id_siswa";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Jika penghapusan berhasil, redirect kembali ke halaman siswa
        echo "<script>
            alert('Data siswa berhasil dihapus');
            document.location.href = 'siswa.php';
        </script>";
    } else {
        // Jika penghapusan gagal, tampilkan pesan error
        echo "<script>
            alert('Data siswa gagal dihapus');
            document.location.href = 'siswa.php';
        </script>";
    }
} else {
    // Jika tidak ada 'id' di URL, redirect ke halaman siswa
    echo "<script>
        alert('Tidak ada data yang dipilih');
        document.location.href = 'siswa.php';
    </script>";
}
