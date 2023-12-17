<?php
session_start();

include("../database/koneksi.php");

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header("Location: ../dashboard/dashboard.php"); // Redirect ke halaman dashboard jika sudah login
    exit();
}

// Cek apakah form login telah disubmit
// implementasi php POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data login dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Lakukan query untuk mendapatkan informasi pengguna berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi kata sandi menggunakan password_verify
        if (password_verify($password, $user['password'])) {
            // Set data pengguna dalam session
            $_SESSION['username'] = $user['nama'];

            // Redirect ke halaman dashboard setelah login berhasil
            header("Location: ../dashboard/dashboard.php");
            exit();
        } else {
            $error_message = "Email atau password salah";
        }
    } else {
        $error_message = "Email atau password salah";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="../index.php"><img id="logo" src="../source/logo.png" alt="logo"></a>
            <div>dimassaputra059</div>
        </div>
        <ul class="nav_link">
            <li><a href="../dashboard/dashboard.php" onclick="showAlert()">Dashboard</a></li>
            <li><a href="../inputBarang/inputBarang.php" onclick="showAlert()">Input Barang</a></li>
            <li><a href="../stokBarang/stokBarang.php" onclick="showAlert()">Stok Barang</a></li>
            <li class="menu_akun">
                <div>
                    <a href="../buatAkun/buatAkun.php">Buat Akun</a>
                    <a href="../loginpage/login.php">Login</a>
                </div>
            </li>
        </ul>
    </nav>
    
    <div class="content_login">
        <form action="" method="post">
            <h2>LOGIN</h2>

            <?php
            // Tampilkan pesan error jika login gagal
            if (isset($error_message)) {
                echo "<p style='color: red; text-align: center;'>$error_message</p>";
            }
            ?>

            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            
            <button type="submit" class="tombol_login">Login</button>

            <div class="buat_akun">
                <p>Tidak punya akun ? <a href="../buatAkun/buatAkun.php">Buat Akun</a></p>
            </div>
        </form>
    </div>

    <footer class="copyright">
        <div>Dimas Saputra <i class='bx bx-copyright'></i> 2023</div>
    </footer>

    <script>
        // event javascript untuk menampilkan alert
        function showAlert() {
            alert("Anda harus login terlebih dahulu!");
        }
    </script>
</body>
</html>