<?php
$host = "localhost";
$username = "dimassap_dimassaputra";
$password = "121140059";
$database = "dimassap_uas";

// Membuat koneksi ke database
try {
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        throw new Exception("Koneksi ke database gagal: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
