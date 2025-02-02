<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../index.php");
    exit;
}

require "fungsi_dashboard.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            overflow-y: auto;
            overflow-x: auto;
        }

        a {
            text-decoration: none;
        }

        .container {
            display: flex;
            min-height: 100%;
            background-color: white;
        }

        .sidebar {
            width: 100px;
            background-color: white;
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 10px 10px 0px 10px;
            /* Kurangi padding-top menjadi 10px */
        }

        .sidebar img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
        }

        .sidebar ul li {
            margin: 24px 0px;
        }

        .sidebar ul li a {
            color: black;
            font-size: 14px;
            letter-spacing: 2px;
            padding: 10px 8px 10px 8px;
            text-transform: uppercase;
            position: relative;
            display: inline-block;
            transition: all 0.4s ease;
            border-radius: 8px;
        }

        .sidebar ul li a:hover {
            background-color: #d1d1d1;
            color: #405c83;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transform: scale(1);
            letter-spacing: 4px;
            font-weight: bold;
            padding: 10px 8px 10px 8px;
        }

        .main-content {
            flex-grow: 1;
        }

        iframe {
            width: 100%;
            height: 100vh;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <!-- Tambahkan logo di sini -->
            <img src="../img.jpg" alt="Logo">

            <ul>
                <li><a href="#" onclick="loadPage('guru/guru.php')">GURU</a></li>
                <li><a href="#" onclick="loadPage('siswa/siswa.php')">SISWA</a></li>
                <li><a href="#" onclick="loadPage('nilai/nilai.php')">NILAI</a></li>
                <li><a href="#" onclick="loadPage('jadwal/jadwal.php')">JADWAL</a></li>
                <li><a href="#" onclick="loadPage('gambar/gambar.php')">GALERI</a></li>
                <li class="logout"><a href="../logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div class="main-content">
            <!-- Iframe untuk menampilkan halaman dinamis -->
            <iframe id="content-frame" src="main.php"></iframe>
        </div>
    </div>

    <script>
        // Fungsi untuk memuat halaman ke dalam iframe
        function loadPage(page) {
            document.getElementById('content-frame').src = page;
        }
    </script>
</body>

</html>