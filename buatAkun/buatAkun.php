<?php
session_start();

include("../database/koneksi.php");

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header("Location: ../dashboard/dashboard.php"); // Redirect ke halaman dashboard jika sudah login
    exit();
}

// implementasi php form dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data login dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // sintaks mysql untuk memasukkan data ke database yang telah diinputkan
    $stmt = $conn->prepare(
        "INSERT INTO users (nama, email, password, jenis_kelamin, tanggal_lahir)
        VALUES (?, ?, ?, ?, ?)"
    );

    // Bind parameter ke prepared statement
    $stmt->bind_param("sssss", $nama, $email, $password, $jenis_kelamin, $tanggal_lahir);

    // Eksekusi pernyataan persiapan
    $stmt->execute();

    $_SESSION['username'] = $nama;

    // Redirect ke halaman login setelah pendaftaran berhasil
    header("Location: ../loginpage/login.php");
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link rel="stylesheet" href="styleBuatAkun.css">
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
    
    <div class="buat_akun">
        <form action="" method="post">
            <h2>Membuat Akun</h2>
            <div class="row">
                <div class="col1">
                    <label for="nama">Nama</label>
                </div>
                <div class="col2">
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="email">Email</label>
                </div>
                <div class="col2">
                    <input type="email" name="email" id="email" placeholder="Masukkan email" required>
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="password">Password</label>
                </div>
                <div class="col2">
                    <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                </div>
                <div class="col2">
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                </div>
                <div class="col2">
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Submit">
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