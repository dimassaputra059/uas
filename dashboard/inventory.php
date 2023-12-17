<?php
// Penerapan OOP pada PHP untuk mengambil data dari database
class Inventory {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllItems() {
        $sql = "SELECT * FROM barang";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    public function searchItems($keyword) {
        $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'";
        $result = $this->db->conn->query($sql);
        return $result;
    }
}

?>
