<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../index.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "siakad");

// Cek koneksi
if (mysqli_connect_error()) {
    die("Koneksi Gagal : " . mysqli_connect_error());
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

// Ambil semua data kelas
function get_kelas()
{
    global $conn;
    $query = "SELECT * FROM kelas";
    return query($query);
}

function hasil_nilai($keyword = '', $id_kelas = null)
{
    global $conn;

    // Query untuk mengambil nilai per siswa dan per mata pelajaran
    $query_nilai = "
        SELECT  siswa.id_siswa, siswa.nama_siswa, siswa.sakit, siswa.izin, siswa.alpha, 
                mapel.nama_mapel, nilai.nilai
        FROM siswa
        LEFT JOIN nilai ON siswa.id_siswa = nilai.id_siswa
        LEFT JOIN mapel ON nilai.id_mapel = mapel.id_mapel
    ";

    // Filter berdasarkan kelas
    if (!empty($id_kelas)) {
        $query_nilai .= " WHERE siswa.id_kelas = $id_kelas";
    }

    // Filter pencarian
    if (!empty($keyword)) {
        $keyword = mysqli_real_escape_string($conn, $keyword); // Mencegah SQL injection
        $query_nilai .= (empty($id_kelas) ? " WHERE" : " AND") . " siswa.nama_siswa LIKE '%$keyword%'";
    }

    // Pengurutan
    $query_nilai .= " ORDER BY siswa.nama_siswa";

    // Jalankan query
    $result = mysqli_query($conn, $query_nilai);
    $rows = [];
    $current_siswa_id = null;
    $current_siswa_data = null;

    // Proses data menjadi array multidimensi
    while ($row = mysqli_fetch_assoc($result)) {
        // Jika siswa baru, simpan data siswa sebelumnya ke array
        if ($row['id_siswa'] !== $current_siswa_id) {
            if ($current_siswa_data !== null) {
                $rows[] = $current_siswa_data;
            }

            // Reset data siswa baru
            $current_siswa_id = $row['id_siswa'];
            $current_siswa_data = [
                'id_siswa' => $row['id_siswa'],
                'nama_siswa' => $row['nama_siswa'],
                'sakit' => $row['sakit'],
                'izin' => $row['izin'],
                'alpha' => $row['alpha'],
                'nilai_mapel' => [], // Tempat menyimpan nilai per mapel
            ];
        }

        // Tambahkan nilai mapel ke siswa saat ini
        if (!empty($row['nama_mapel'])) {
            $current_siswa_data['nilai_mapel'][$row['nama_mapel']] = $row['nilai'];
        }
    }

    // Jangan lupakan siswa terakhir
    if ($current_siswa_data !== null) {
        $rows[] = $current_siswa_data;
    }

    return $rows;
}
