<?php
$conn = mysqli_connect("localhost", "root", "", "siakad");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tatausaha') {
    header("Location: ../index.php");
    exit;
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data, $file)
{
    global $conn;
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $nama_gambar = upload($file['gambar']);
    if (!$nama_gambar) {
        return false;
    }

    $query = "INSERT INTO gambar (nama_gambar, deskripsi) VALUES ('$nama_gambar', '$deskripsi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data, $file)
{
    global $conn;
    $id = htmlspecialchars($data["id_gambar"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    // Jika user mengganti gambar
    if ($file['gambar']['error'] === 4) {
        $nama_gambar = $data["nama_gambar_lama"];
    } else {
        $nama_gambar = upload($file['gambar']);
    }

    $query = "UPDATE gambar SET nama_gambar = '$nama_gambar', deskripsi = '$deskripsi' WHERE id_gambar = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    $gambar = query("SELECT * FROM gambar WHERE id_gambar = $id")[0];
    unlink("../../uploads/" . $gambar['nama_gambar']); // Hapus file dari folder uploads
    mysqli_query($conn, "DELETE FROM gambar WHERE id_gambar = $id");

    return mysqli_affected_rows($conn);
}

function upload($file)
{
    $namaFile = $file['name'];
    $tmpName = $file['tmp_name'];

    // Pindahkan file ke folder uploads
    move_uploaded_file($tmpName, '../../uploads/' . $namaFile);

    return $namaFile;
}
