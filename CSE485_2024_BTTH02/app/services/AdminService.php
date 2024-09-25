<?php
require_once("./configs/DBConnection.php"); // Điều chỉnh đường dẫn nếu cần

require_once("./app/models/AdminModel.php");

class AdminService {
    private $adminModel;

    public function __construct() {
        // Tạo đối tượng DBConnection
        $dbConnection = new DBConnection();
        $this->adminModel = new AdminModel($dbConnection->getConnection()); // Truyền kết nối vào AdminModel
    }

    public function getUserCount() {
        return $this->adminModel->getUserCount();
    }

    public function getCategoryCount() {
        return $this->adminModel->getCategoryCount();
    }

    public function getAuthorCount() {
        return $this->adminModel->getAuthorCount();
    }

    public function getArticleCount() {
        return $this->adminModel->getArticleCount();
    }
}
?>
