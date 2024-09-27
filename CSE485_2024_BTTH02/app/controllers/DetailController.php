<!-- Hoàng Quốc Bảo -->

<?php
require_once("./app/models/DetailModel.php");
require_once("./app/services/DetailService.php");

class DetailController{
    public function index($id) {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $detailService = new DetailService();
        $details = $detailService->getDetailById($id);
    
        // Kiểm tra nếu có chi tiết bài viết
        if ($details === null) {
            echo "Không tìm thấy bài viết.";
            return; // Dừng thực thi nếu không tìm thấy bài viết
        }
    
        // Nhiệm vụ 2: Tương tác với View
        include("./app/views/home/detail.php");
    }
    
}