<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "siakad");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $kata_kunci = $_POST['kata_kunci'];

    // Validasi input
    if (empty($username) || empty($password) || empty($role)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } else {
        // Cek kata kunci berdasarkan role
        $valid = true;
        if ($role == 'tatausaha' && $kata_kunci != 'masuk tu') {
            echo "<script>
                    alert('Kata kunci salah untuk role Tata Usaha!');
                </script>";
            $valid = false;
        } elseif ($role == 'guru' && $kata_kunci != 'masuk guru') {
            echo "<script>
                    alert('Kata kunci salah untuk role Guru!');
                </script>";
            $valid = false;
        } elseif ($role == 'siswa' && !empty($kata_kunci)) {
            echo "<script>
                    alert('Tidak perlu kata kunci untuk role Siswa!');
                </script>";
            $valid = false;
        }

        if ($valid) {
            // Enkripsi password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Simpan data ke database
            $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $role);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Registrasi gagal! Silakan coba lagi.');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="regis.php" method="post">
            <h2>Registrasi</h2>

            <label for="username">Username</label>
            <input type="text" name="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <label for="role">Role</label>
            <select name="role" required>
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
                <option value="tatausaha">Tata Usaha</option>
            </select><br><br>

            <label for="kata_kunci">Kata Kunci</label>
            <input type="text" name="kata_kunci" placeholder="Masukkan kata kunci jika diperlukan">

            <button type="submit">Registrasi</button>
        </form>
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
    </div>
</body>

</html>