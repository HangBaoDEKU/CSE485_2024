<?php

class DBConnection {
    private $conn = null;

    public function __construct() {
        // B1. Kết nối đến DB Server
        try {
            // Thiết lập kết nối PDO
            $this->conn = new PDO('mysql:host=localhost;dbname=BTTH01_CSE485;port=3306', 'root', '');
            // Thiết lập chế độ báo lỗi
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // In ra thông báo lỗi nếu kết nối thất bại
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}