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

function ubah($data)
{
    global $conn; // ambil $conn dari luar fungsi ini
    $id_guru        = htmlspecialchars($data["id_guru"]);
    $nama_guru      = htmlspecialchars($data["nama_guru"]);
    $jenis_kelamin  = htmlspecialchars($data["jenis_kelamin"]);
    $tempat_lahir   = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir  = htmlspecialchars($data["tanggal_lahir"]);
    $NIP            = htmlspecialchars($data["NIP"]);
    $status_pegawai = htmlspecialchars($data["status_pegawai"]);
    $jenis_ptk      = htmlspecialchars($data["jenis_ptk"]);
    $agama          = htmlspecialchars($data["agama"]);
    $telp           = htmlspecialchars($data["telp"]);
    $email          = htmlspecialchars($data["email"]);


    $query = "UPDATE guru SET
                nama_guru = '$nama_guru',     
                jenis_kelamin = '$jenis_kelamin', 
                tempat_lahir = '$tempat_lahir',  
                tanggal_lahir = '$tanggal_lahir', 
                NIP = '$NIP' ,          
                status_pegawai = '$status_pegawai',
                jenis_ptk = '$jenis_ptk',     
                agama = '$agama',         
                telp = '$telp' ,         
                email = '$email'
            WHERE id_guru = '$id_guru';
    ";

    if (!mysqli_query($conn, $query)) {
        echo "Error: " . mysqli_error($conn); // Menampilkan pesan kesalahan jika query gagal
        return -1;
    }
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    $nama_guru      = htmlspecialchars($data["nama_guru"]);
    $jenis_kelamin  = htmlspecialchars($data["jenis_kelamin"]);
    $tempat_lahir   = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir  = htmlspecialchars($data["tanggal_lahir"]);
    $NIP            = htmlspecialchars($data["NIP"]);
    $status_pegawai = htmlspecialchars($data["status_pegawai"]);
    $jenis_ptk      = htmlspecialchars($data["jenis_ptk"]);
    $agama          = htmlspecialchars($data["agama"]);
    $telp           = htmlspecialchars($data["telp"]);
    $email          = htmlspecialchars($data["email"]);

    $query = "INSERT INTO guru (nama_guru, jenis_kelamin, tempat_lahir, tanggal_lahir, NIP, status_pegawai, jenis_ptk, agama, telp, email)
                VALUES ('$nama_guru', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$NIP', '$status_pegawai', '$jenis_ptk', '$agama', '$telp', '$email')";

    if (!mysqli_query($conn, $query)) {
        echo "Error: " . mysqli_error($conn);
        return -1;
    }

    return mysqli_affected_rows($conn);
}
