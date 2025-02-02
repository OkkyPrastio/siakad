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

// Fungsi untuk mengambil jumlah data guru dan siswa
function getJumlah($table)
{
    global $conn;
    $query = "SELECT COUNT(*) as total FROM $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Mengambil jumlah guru dan siswa
$jumlahGuru = getJumlah('guru');
$jumlahSiswa = getJumlah('siswa');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
            color: #333;
            user-select: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* Gaya untuk header */
        .header {
            width: 100%;
            background-color: #5a6268;
            color: #f4f6f9;
            padding: 20px;
            font-size: 24px;
            font-weight: 500;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-info {
            font-size: 14px;
            margin-top: 10px;
            color: #f0f0f0;
        }

        .header-info a {
            color: #f4f6f9;
            text-decoration: none;
        }

        /* Kontainer utama */
        .content-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding: 40px;
            margin-top: 30px;
            max-width: 800px;
        }

        /* Kartu guru dan siswa */
        .card {
            width: 260px;
            height: 260px;
            background-color: #fff;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-top: 10px;
            letter-spacing: 2px;
        }

        .count {
            font-size: 64px;
            font-weight: bold;
            color: #333;
        }

        .guru {
            background: linear-gradient(145deg, #6ab04c, #4CAF50);
            color: #fff;
        }

        .siswa {
            background: linear-gradient(145deg, #ff5b5b, #CC2B52);
            color: #fff;
        }

        /* Warna dan ikon pada judul */
        .card-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
                gap: 20px;
            }

            .card {
                width: 220px;
                height: 220px;
            }

            .count {
                font-size: 48px;
            }

            .card-title {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        SMPN 1 KEMIRI KABUPATEN TANGERANG
        <div class="header-info">
            Alamat: <a href="https://maps.app.goo.gl/PcmHLsVFexseYrvz7" target="_blank">Google Maps</a> |
            Email: <a href="mailto:smpn1kemiri@gmail.com">smpn1kemiri@gmail.com</a> |
            Instagram: <a href="https://instagram.com/smpn1kemiri_" target="_blank">@smpn1kemiri_</a> |
            Facebook: <a href="https://facebook.com/SMPNegeri1Kemiri" target="_blank">SMP Negeri 1 Kemiri</a>
        </div>
    </div>

    <div class="content-container">
        <div class="card guru">
            <div class="card-icon">👨‍🏫</div>
            <div class="count"><?php echo $jumlahGuru; ?></div>
            <div class="card-title">GURU</div>
        </div>
        <div class="card siswa">
            <div class="card-icon">👩‍🎓</div>
            <div class="count"><?php echo $jumlahSiswa; ?></div>
            <div class="card-title">SISWA</div>
        </div>
    </div>
</body>

</html>