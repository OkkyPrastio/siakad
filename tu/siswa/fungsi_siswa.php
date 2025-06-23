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
    global $conn;
    $id_siswa       = htmlspecialchars($data["id_siswa"]);
    $nama_siswa     = htmlspecialchars($data["nama_siswa"]);
    $nipd           = htmlspecialchars($data["nipd"]);
    $nisn           = htmlspecialchars($data["nisn"]);
    $jenis_kelamin  = htmlspecialchars($data["jenis_kelamin"]);
    $tempat_lahir   = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir  = htmlspecialchars($data["tanggal_lahir"]);
    $agama          = htmlspecialchars($data["agama"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $rt             = htmlspecialchars($data["rt"]);
    $rw             = htmlspecialchars($data["rw"]);
    $dusun          = htmlspecialchars($data["dusun"]);
    $kelurahan      = htmlspecialchars($data["kelurahan"]);
    $kecamatan      = htmlspecialchars($data["kecamatan"]);
    $kode_pos       = htmlspecialchars($data["kode_pos"]);
    $telp           = htmlspecialchars($data["telp"]);
    $id_kelas       = htmlspecialchars($data["id_kelas"]);

    $query = "UPDATE siswa SET
                nama_siswa    = '$nama_siswa',
                NIPD          = '$nipd',
                NISN          = '$nisn',
                jenis_kelamin = '$jenis_kelamin',
                tempat_lahir  = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                agama         = '$agama',
                alamat        = '$alamat',
                rt            = '$rt',
                rw            = '$rw',
                dusun         = '$dusun',
                kelurahan     = '$kelurahan',
                kecamatan     = '$kecamatan',
                kode_pos      = '$kode_pos',
                telp          = '$telp',
                id_kelas      = '$id_kelas'
            WHERE id_siswa    = '$id_siswa';
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

    $nama_siswa = htmlspecialchars($data["nama_siswa"]);
    $nipd = htmlspecialchars($data["nipd"]);
    $nisn = htmlspecialchars($data["nisn"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $agama = htmlspecialchars($data["agama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $rt = htmlspecialchars($data["rt"]);
    $rw = htmlspecialchars($data["rw"]);
    $dusun = htmlspecialchars($data["dusun"]);
    $kelurahan = htmlspecialchars($data["kelurahan"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kode_pos = htmlspecialchars($data["kode_pos"]);
    $telp = htmlspecialchars($data["telp"]);
    $id_kelas = htmlspecialchars($data["id_kelas"]);

    $query = "INSERT INTO siswa 
                (nama_siswa, NIPD, NISN, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat, rt, rw, dusun, kelurahan, kecamatan, kode_pos, telp, id_kelas) 
                VALUES 
                ('$nama_siswa', '$nipd', '$nisn', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$alamat', '$rt', '$rw', '$dusun', '$kelurahan', '$kecamatan', '$kode_pos', '$telp', '$id_kelas')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
