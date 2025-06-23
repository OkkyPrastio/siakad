<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../index.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "siakad");

// cek koneksi
if (mysqli_connect_error()) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

// ambil koneksi $conn secara global
function query($query)
{
    global $conn;
    $result     = mysqli_query($conn, $query);
    $rows       = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
