<?php
session_start();

include("../database/koneksi.php");

// Cek apakah pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../loginpage/login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// username session disimpan ke logged_in_user
$logged_in_user = $_SESSION['username'];

// Implementasi PHP form untuk metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data login dari form
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $harga = $_POST['harga_barang'];
    $jumlah = $_POST['jumlah_barang'];

    if ($jenis_barang === 'other') {
        // Jika "Lainnya" dipilih, ambil nilai dari input teks
        $jenis_barang = $_POST['jenis_barang_other'];
    }

    $stmt = $conn->prepare(
        "INSERT INTO barang (nama_barang, jenis_barang, harga, jumlah)
        VALUES (?, ?, ?, ?)"
    );

    // Bind parameter ke prepared statement
    $stmt->bind_param("ssss", $nama_barang, $jenis_barang, $harga, $jumlah);

    // Eksekusi pernyataan persiapan
    $stmt->execute();

    // Redirect ke halaman dashboard setelah input barang berhasil
    header("Location: ../dashboard/dashboard.php");
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <link rel="stylesheet" href="styleInput.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="../index.php"><img id="logo" src="../source/logo.png" alt="logo"></a>
            <div>dimassaputra059</div>
        </div>
        <ul class="nav_link">
            <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
            <li><a href="inputBarang.php">Input Barang</a></li>
            <li><a href="../stokBarang/stokBarang.php">Stok Barang</a></li>
            <li class="menu_akun">
                <div>
                    <!-- Tampilkan username session -->
                    <p><?php echo $logged_in_user; ?></p>
                    <a href="../logout/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="input_barang">
        <form action="" method="post">
            <h2>Input Barang</h2>
            <div class="row">
                <div class="col1">
                    <label for="nama_barang">Nama Barang</label>
                </div>
                <div class="col2">
                    <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang" required>
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="jenis_barang">Jenis Barang</label>
                </div>
                <div class="col2">
                    <label>
                        <input type="radio" name="jenis_barang" id="makanan" value="Makanan">Makanan
                    </label>
                    <label>
                        <input type="radio" name="jenis_barang" id="minuman" value="Minuman">Minuman
                    </label>
                    <label>
                    <input type="radio" name="jenis_barang" id="other" value="other"> Lainnya
                    </label>
                    <input type="text" name="jenis_barang_other" id="jenis_barang_other" placeholder="Jenis Barang Lainnya" style="display:none;">
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="harga_barang">Harga Barang</label>
                </div>
                <div class="col2">
                    <div class="input_harga">
                        <span class="rupiah">Rp.</span>
                        <input type="text" name="harga_barang" id="harga_barang" placeholder="Masukkan harga barang" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col1">
                    <label for="jumlah_barang">Jumlah Barang</label>
                </div>
                <div class="col2">
                    <input type="text" name="jumlah_barang" id="jumlah_barang" placeholder="Masukkan jumlah barang" required>
                    <p id="error_message" style="color: red;"></p>
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

    <!-- Implementasi event dengan javascript-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var radioMakanan = document.getElementById('makanan');
            var radioMinuman = document.getElementById('minuman');
            var radioOther = document.getElementById('other');
            var inputText = document.getElementById('jenis_barang_other');

            function updateInputVisibility() {
                inputText.style.display = radioOther.checked ? 'block' : 'none';
            }

            // Pertama kali, panggil fungsi untuk menyembunyikan input teks
            updateInputVisibility();

            // Tambahkan event listener untuk setiap radio button
            radioMakanan.addEventListener('change', updateInputVisibility);
            radioMinuman.addEventListener('change', updateInputVisibility);
            radioOther.addEventListener('change', updateInputVisibility);
        });
        
        document.addEventListener('DOMContentLoaded', function () {
            // Event listener untuk input harga_barang
            var hargaInput = document.getElementById('harga_barang');
            hargaInput.addEventListener('input', function () {
                // Pastikan hanya angka yang diterima
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Event listener untuk input jumlah_barang
            var jumlahInput = document.getElementById('jumlah_barang');
            jumlahInput.addEventListener('input', function () {
                // Pastikan hanya angka yang diterima
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Event listener untuk form submission
            var form = document.querySelector('form');
            form.addEventListener('submit', function (event) {
                // Validasi sebelum mengirim formulir
                var jumlahValue = parseInt(jumlahInput.value);
                var hargaValue = parseInt(hargaInput.value);

                if (isNaN(jumlahValue) || isNaN(hargaValue)) {
                    // Jika jumlah atau harga bukan angka, tampilkan pesan kesalahan
                    event.preventDefault(); // Mencegah formulir dikirim
                    document.getElementById('error_message').innerText = 'Jumlah dan harga harus berupa angka.';
                } else {
                    // Jika valid, reset pesan kesalahan
                    document.getElementById('error_message').innerText = '';
                }
            });
        });
    </script>

</body>
</html>