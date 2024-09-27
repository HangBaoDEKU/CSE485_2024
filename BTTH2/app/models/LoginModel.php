
<?php
require_once('./configs/DBConnection.php');

class LoginModel {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
