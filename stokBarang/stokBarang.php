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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="styleStok.css">
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
            <li><a href="../inputBarang/inputBarang.php">Input Barang</a></li>
            <li><a href="stokBarang.php">Stok Barang</a></li>
            <li class="menu_akun">
                <div>
                    <p><?php echo $logged_in_user; ?></p>
                    <a href="../logout/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="stok_barang">
        <h2>Stok Barang</h2>
        <p>note: Tambahkan (-) awal angka, ketika ingin melakukan pengurangan stok barang</p>

        <?php
        // Query SQL untuk mengambil data dari tabel barang
        $sql = "SELECT * FROM barang";
        $result = $conn->query($sql);

        // Tampilkan data dalam tabel HTML
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok Barang</th>
                        <th>Tambah/Kurang Barang</th>
                    </tr>";
        
            // Loop untuk menampilkan setiap baris data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nama_barang"] . "</td>
                        <td>" . $row["jumlah"] . "</td>
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='barang_id' value='" . $row["id"] . "'>
                                <input type='number' name='tambah_kurang' placeholder='Masukkan jumlah' required>
                                <button type='submit' name='submit_tambah_kurang_stok'>Submit</button>
                            </form>
                        </td>
                    </tr>";
            }
        
            echo "</table>";
        } else {
            echo "Tidak ada data.";
        }

        // Proses penambahan/kurang barang
        // Implementasi untuk update data pada database
        if (isset($_POST['submit_tambah_kurang_stok'])) {
            $barang_id = $_POST['barang_id'];
            $tambah_kurang = $_POST['tambah_kurang'];

            // Mendapatkan jumlah stok saat ini
            $stmt_select = $conn->prepare("SELECT jumlah FROM barang WHERE id = ?");
            $stmt_select->bind_param("s", $barang_id);
            $stmt_select->execute();
            $stmt_select->bind_result($jumlah_sekarang);
            $stmt_select->fetch();
            $stmt_select->close();
                
            // Menghitung stok baru
            $stok_baru = $jumlah_sekarang + $tambah_kurang;
                
            // Menyiapkan dan mengeksekusi pernyataan UPDATE
            $stmt_update = $conn->prepare("UPDATE barang SET jumlah = ? WHERE id = ?");
            $stmt_update->bind_param("ss", $stok_baru, $barang_id);
            $stmt_update->execute();
            $stmt_update->close();

            header("Location: stokBarang.php");
        }

        // Tutup koneksi ke database
        $conn->close();
        ?>
    </div>

    <footer class="copyright">
        <div>Dimas Saputra <i class='bx bx-copyright'></i> 2023</div>
    </footer>
</body>
</html>