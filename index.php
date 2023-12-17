<?php
session_start();

// username session disimpan ke logged_in_user, ketika belum login maka nilainya null
$logged_in_user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styleHome.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        var loggedInUser = <?php echo json_encode($logged_in_user); ?>;
    </script>
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="index.php"><img id="logo" src="../source/logo.png" alt="logo"></a>
            <div>dimassaputra059</div>
        </div>
        <ul class="nav_link">
            <?php if (isset($logged_in_user)) { ?>
                <!-- Tampilkan menu setelah login -->
                <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
                <li><a href="../inputBarang/inputBarang.php">Input Barang</a></li>
                <li><a href="../stokBarang/stokBarang.php">Stok Barang</a></li>
                <li class="menu_akun">
                    <div>
                        <p><?php echo $logged_in_user; ?></p>
                        <a href="../logout/logout.php">Logout</a>
                    </div>
                </li>
            <?php } else { ?>
                <!-- Tampilkan menu sebelum login -->
                <li><a href="../dashboard/dashboard.php" onclick="showAlert()">Dashboard</a></li>
                <li><a href="../inputBarang/inputBarang.php" onclick="showAlert()">Input Barang</a></li>
                <li><a href="../stokBarang/stokBarang.php" onclick="showAlert()">Stok Barang</a></li>
                <li class="menu_akun">
                    <div>
                        <a href="../buatAkun/buatAkun.php">Buat Akun</a>
                        <a href="../loginpage/login.php">Login</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </nav>

    <div class="content">
        <div class="text">
            <h2>Inventory Barang</h2>
            <p>Web ini digunakan untuk manajemen barang dalam pengecekan stok barang.
            </p>
            <p>Bisa melakukan :</p>
            <ul>
                <li>1. Penambahan barang </li>
                <li>2. Melihat barang yang tersedia</li>
                <li>3. Menambah/Mengurangi stok barang</li>
                <li>4. Mencari barang</li>
            </ul>
        </div>
        <img src="../source/barang.png" alt="barang">
    </div>

    <footer class="copyright">
        <div>Dimas Saputra <i class='bx bx-copyright'></i> 2023</div>
    </footer>

    <script>
        // Implementasi fungsi cookie dengan javascript
        // Fungsi untuk menetapkan cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        // Fungsi untuk mendapatkan nilai cookie berdasarkan nama
        function getCookie(name) {
            var nameEQ = name + "=";
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1, cookie.length);
                }
                if (cookie.indexOf(nameEQ) == 0) {
                    return cookie.substring(nameEQ.length, cookie.length);
                }
            }
            return null;
        }

        // Fungsi untuk menghapus cookie berdasarkan nama
        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }

        // Implementasi event dengan javascript
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk menampilkan pesan peringatan jika pengguna belum login
            function showAlert() {
                alert("Anda harus login terlebih dahulu!");
            }

            // Cek apakah pengguna sudah login atau belum
            if (loggedInUser) {
                // Tampilkan menu setelah login
                var navLinks = document.querySelectorAll('.nav_link a');
                navLinks[0].href = "../dashboard/dashboard.php";
                navLinks[1].href = "../inputBarang/inputBarang.php";
                navLinks[2].href = "../stokBarang/stokBarang.php";
                navLinks[3].querySelector('div p').innerText = loggedInUser;
                navLinks[3].querySelector('div a').href = "../logout/logout.php";
            } else {
                // Tampilkan menu sebelum login
                var navLinks = document.querySelectorAll('.nav_link a');
                navLinks[0].addEventListener('click', showAlert);
                navLinks[1].addEventListener('click', showAlert);
                navLinks[2].addEventListener('click', showAlert);
                navLinks[3].querySelector('div a').href = "../buatAkun/buatAkun.php";
                navLinks[3].querySelector('div a:nth-child(2)').href = "../loginpage/login.php";
            }
        });
    </script>
</body>
</html>