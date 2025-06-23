<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
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

function ubah($data)
{
    global $conn;

    $id_siswa = $data['id_siswa'];
    $nilai    = $data['nilai']; // Ambil nilai mata pelajaran
    $sakit    = $data['sakit'];
    $izin     = $data['izin'];
    $alpha    = $data['alpha'];

    // Update keterangan sakit, izin, dan alpha
    $query_sakit = "UPDATE siswa SET sakit = '$sakit', izin = '$izin', alpha = '$alpha' WHERE id_siswa = $id_siswa";

    // Periksa dan tangani error
    if (!mysqli_query($conn, $query_sakit)) {
        echo "Error updating student info: " . mysqli_error($conn);
        return -1; // Mengembalikan -1 jika ada error
    }

    // Update nilai untuk setiap mata pelajaran
    foreach ($nilai as $id_mapel => $nilai_value) {
        // Pastikan nilai_value adalah float atau decimal jika diperlukan
        $nilai_value = floatval($nilai_value);

        // Cek apakah nilai sudah ada
        $query_check = "SELECT * FROM nilai WHERE id_siswa = $id_siswa AND id_mapel = $id_mapel";
        $result = mysqli_query($conn, $query_check);

        if (!$result) {
            echo "Error checking existing value: " . mysqli_error($conn);
            return -1; // Mengembalikan -1 jika ada error
        }

        if (mysqli_num_rows($result) > 0) {
            // Jika nilai sudah ada, update
            $query_update = "UPDATE nilai SET nilai = '$nilai_value' WHERE id_siswa = $id_siswa AND id_mapel = $id_mapel";
            if (!mysqli_query($conn, $query_update)) {
                echo "Error updating value: " . mysqli_error($conn);
                return -1; // Mengembalikan -1 jika ada error
            }
        } else {
            // Jika nilai belum ada, insert
            $query_insert = "INSERT INTO nilai (id_siswa, id_mapel, nilai) VALUES ($id_siswa, $id_mapel, '$nilai_value')";
            if (!mysqli_query($conn, $query_insert)) {
                echo "Error inserting value: " . mysqli_error($conn);
                return -1; // Mengembalikan -1 jika ada error
            }
        }
    }

    // Mengembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;

    $id_siswa = $data['id_siswa'];
    $nilai_mapel = $data['nilai'];  // Array dari nilai setiap mapel
    $sakit = $data['sakit'];
    $izin = $data['izin'];
    $alpha = $data['alpha'];

    // Update data sakit, izin, dan alpha ke tabel siswa
    $query_absensi = "UPDATE siswa 
                        SET sakit = '$sakit', izin = '$izin', alpha = '$alpha'
                        WHERE id_siswa = '$id_siswa'";
    mysqli_query($conn, $query_absensi);

    // Loop untuk menyimpan nilai setiap mata pelajaran
    foreach ($nilai_mapel as $id_mapel => $nilai) {
        // Insert nilai untuk setiap mapel
        $query_nilai = "INSERT INTO nilai (id_siswa, id_mapel, nilai) 
                        VALUES ('$id_siswa', '$id_mapel', '$nilai')";
        mysqli_query($conn, $query_nilai);
    }

    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus semua nilai dan absensi siswa
function hapus($id_siswa)
{
    global $conn;

    // Hapus semua nilai siswa
    $query_hapus_nilai = "DELETE FROM nilai WHERE id_siswa = '$id_siswa'";
    mysqli_query($conn, $query_hapus_nilai);

    // Reset nilai absensi siswa
    $query_reset_absensi = "UPDATE siswa SET sakit = 0, izin = 0, alpha = 0 WHERE id_siswa = '$id_siswa'";
    mysqli_query($conn, $query_reset_absensi);

    return mysqli_affected_rows($conn);
}
