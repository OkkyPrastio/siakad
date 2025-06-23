<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
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

function tambah($data)
{
    global $conn;
    $id_mapel    = htmlspecialchars($data["id_mapel"]);
    $id_guru     = htmlspecialchars($data["id_guru"]);
    $id_kelas    = htmlspecialchars($data["id_kelas"]);
    $hari        = htmlspecialchars($data["hari"]);
    $jam_mulai   = htmlspecialchars($data["jam_mulai"]);
    $jam_selesai = htmlspecialchars($data["jam_selesai"]);

    $query = "INSERT INTO jadwal (id_mapel, id_guru, id_kelas, hari, jam_mulai, jam_selesai)
            VALUES ('$id_mapel', '$id_guru', '$id_kelas', '$hari', '$jam_mulai', '$jam_selesai')";

    if (!mysqli_query($conn, $query)) {
        echo "Error: " . mysqli_error($conn);
        return -1;
    }

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id_jadwal   = htmlspecialchars($data["id_jadwal"]);
    $id_mapel    = htmlspecialchars($data["id_mapel"]);
    $id_guru     = htmlspecialchars($data["id_guru"]);
    $id_kelas    = htmlspecialchars($data["id_kelas"]);
    $hari        = htmlspecialchars($data["hari"]);
    $jam_mulai   = htmlspecialchars($data["jam_mulai"]);
    $jam_selesai = htmlspecialchars($data["jam_selesai"]);

    $query = "UPDATE jadwal SET
                id_mapel    = '$id_mapel',
                id_guru     = '$id_guru',
                id_kelas    = '$id_kelas',
                hari        = '$hari',
                jam_mulai   = '$jam_mulai',
                jam_selesai = '$jam_selesai'
            WHERE id_jadwal = '$id_jadwal'";

    if (!mysqli_query($conn, $query)) {
        echo "Error: " . mysqli_error($conn);
        return -1;
    }

    return mysqli_affected_rows($conn);
}

function hapus($id_jadwal)
{
    global $conn;

    // Query untuk menghapus jadwal berdasarkan id_jadwal
    $query = "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'";

    // Jalankan query
    if (!mysqli_query($conn, $query)) {
        echo "Error: " . mysqli_error($conn);
        return -1;
    }

    return mysqli_affected_rows($conn);
}
