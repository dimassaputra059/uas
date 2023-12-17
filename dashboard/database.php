<?php
// Penerapan OOP pada php untuk koneksi ke database
class Database {
    private $host = "localhost";
    private $username = "dimassap_dimassaputra";
    private $password = "121140059";
    private $database = "dimassap_uas";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
