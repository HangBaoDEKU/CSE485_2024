<!-- Hoàng Quốc Bảo -->

<?php
require_once("./app/models/AdminModel.php");
require_once("./app/services/AdminService.php");

class AdminController {
    private $adminService;

    public function __construct() {
        $this->adminService = new AdminService(); 
    }

    public function index() {
        $count_users = $this->adminService->getUserCount();
        $count_theloai = $this->adminService->getCategoryCount();
        $count_tacgia = $this->adminService->getAuthorCount();
        $count_baiviet = $this->adminService->getArticleCount();

        include("./app/views/admin/index.php");
    }
}
?>
