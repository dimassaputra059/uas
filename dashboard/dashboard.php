<?php
session_start();

include("database.php");
include("inventory.php");

// Cek apakah pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../loginpage/login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// username session disimpan ke logged_in_user
$logged_in_user = $_SESSION['username'];

// Penerapan OOP pada php

// Buat koneksi ke database
$database = new Database();

// Buat instance Inventory
$inventory = new Inventory($database);

// Proses pencarian jika ada parameter 'keyword' pada URL
// Implementasi php form untuk metode GET
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $result = $inventory->searchItems($keyword);
} else {
    // Jika tidak ada parameter 'keyword', tampilkan semua barang
    $result = $inventory->getAllItems();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Barang</title>
    <link rel="stylesheet" href="styleDashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="../index.php"><img id="logo" src="../source/logo.png" alt="logo"></a>
            <div>dimassaputra059</div>
        </div>
        <ul class="nav_link">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="../inputBarang/inputBarang.php">Input Barang</a></li>
            <li><a href="../stokBarang/stokBarang.php">Stok Barang</a></li>
            <li class="menu_akun">
                <div>
                    <!-- Tampilkan session username -->
                    <p><?php echo $logged_in_user; ?></p>
                    <a href="../logout/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="tabel_barang">
        <h2>Inventory Barang</h2>

        <div class="cari_barang">
            <form id="input_form" action="" method="get">
                <input type="text" name="keyword" id="input_cari" placeholder="Cari dengan nama barang">
                <button type="submit">Cari</button>
            </form>
        </div>

        <?php
        // Tampilkan data dalam tabel HTML
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Harga Barang</th>
                        <th>Jumlah Barang</th>
                    </tr>";
        
            // Loop untuk menampilkan setiap baris data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nama_barang"] . "</td>
                        <td>" . $row["jenis_barang"] . "</td>
                        <td>Rp." . $row["harga"] . ",00</td>
                        <td>" . $row["jumlah"] . "</td>
                    </tr>";
            }
        
            echo "</table>";
        } else {
            echo "Tidak ada data.";
        }

        // Tutup koneksi ke database
        $database->closeConnection();
        ?>
    </div>


    <footer class="copyright">
        <div>Dimas Saputra <i class='bx bx-copyright'></i> 2023</div>
    </footer>

</body>
</html>