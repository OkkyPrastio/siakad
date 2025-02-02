<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "siakad");

// Fungsi cek_login untuk memvalidasi login dan mengembalikan peran pengguna
function cek_login($username, $password)
{
    global $conn;

    // Melakukan query untuk mendapatkan data pengguna berdasarkan username
    $query = "SELECT username, password, role FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Memeriksa apakah username ditemukan
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $db_username, $db_password, $db_role);
        mysqli_stmt_fetch($stmt);

        // Verifikasi password
        if (password_verify($password, $db_password)) {
            return $db_role; // Mengembalikan peran pengguna jika login berhasil
        }
    }

    return false; // Mengembalikan false jika login gagal
}

// Proses login ketika form login dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memanggil fungsi cek_login untuk memvalidasi
    $role = cek_login($username, $password);

    if ($role) {
        $_SESSION['role'] = $role;

        // Arahkan ke dashboard berdasarkan role
        switch ($role) {
            case 'tatausaha':
                header("Location: tu/dashboard.php");
                break;
            case 'guru':
                header("Location: guru/dashboard.php");
                break;
            case 'siswa':
                header("Location: siswa/dashboard.php");
                break;
            default:
                header("Location: index.php");
                break;
        }
        exit;
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">
            <h2>Login</h2>
            <label for="username">Username</label>
            <input type="text" autofocus name="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="regis.php">Daftar di sini</a></p>
    </div>
</body>

</html>