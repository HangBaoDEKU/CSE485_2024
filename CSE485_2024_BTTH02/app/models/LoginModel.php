<?php
require_once './configs/DBConnection.php';

class LoginModel {
    private $conn;

    public function __construct() {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
