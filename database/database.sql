SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    jenis_kelamin varchar(50) NOT NULL,
    tanggal_lahir date NOT NULL
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `barang` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_barang varchar(50) NOT NULL,
    jenis_barang varchar(50) NOT NULL,
    harga INT NOT NULL,
    jumlah INT NOT NULL
)