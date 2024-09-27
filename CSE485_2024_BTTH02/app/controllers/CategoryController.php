<!-- Đào Khánh Huyền -->

<?php
require_once("./app/models/CategoryModel.php");
require_once("./app/services/CategoryService.php");

class CategoryController {
    private $categoryService;

    public function __construct() {
        $this->categoryService = new CategoryService();
    }

    // Hàm xử lý hành động index
    public function index() {
        // Lấy danh sách thể loại từ service
        $categories = $this->categoryService->getAllCategories();
        
        // Tương tác với View
        include("./app/views/category/list_category.php");
    }

    // Hàm xử lý thêm thể loại mới
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tloai = $_POST['tentloai'] ?? null;

            // Kiểm tra dữ liệu
            if (empty($ten_tloai)) {
                echo "<script>alert('Mời nhập tên thể loại'); window.location.href = 'add_category.php';</script>";
                return;
            }

            // Thêm thể loại vào database
            if ($this->categoryService->addCategory($ten_tloai)) {
                echo "<script>alert('Thêm thể loại thành công'); window.location.href = 'index.php?controller=category&action=index';</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm thể loại');</script>";
            }
        }

        include("./app/views/category/add_category.php");
    }

    // Hàm xử lý chỉnh sửa thể loại
    public function edit($id) {
        // Kiểm tra ID hợp lệ
        if (!is_numeric($id)) {
            echo "ID không hợp lệ.";
            return;
        }

        // Lấy thể loại từ service
        $category = $this->categoryService->getCategoryById($id);

        // Kiểm tra xem thể loại có tồn tại hay không
        if (!$category) {
            echo "Thể loại không tồn tại.";
            return;
        }

        // Tương tác với View
        include("./app/views/category/edit_category.php");
    }

    // Hàm xử lý cập nhật thể loại
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matloai = $_POST['matloai'];
            $tentloai = $_POST['tentloai'];

            // Kiểm tra dữ liệu
            if ($matloai == NULL || $tentloai == NULL) {
                echo "Bạn chưa nhập đầy đủ thông tin";
            } else {
                $category = new CategoryModel($matloai, $tentloai);
                
                // Cập nhật thể loại
                if ($this->categoryService->updateCategory($category)) {
                    header("Location: index.php?controller=category&action=index");
                    exit();
                } else {
                    echo "Lỗi khi cập nhật thể loại.";
                }
            }
        }
    }

    // Hàm xử lý xóa thể loại
    public function delete($id) {
        // Kiểm tra ID hợp lệ
        if (!is_numeric($id)) {
            echo "ID không hợp lệ.";
            return;
        }

        if ($this->categoryService->deleteCategory($id)) {
            header("Location: index.php?controller=category&action=index");
            exit();
        } else {
            echo "<h1>Lỗi khi xóa thể loại.</h1>";
        }
    }
}
?>