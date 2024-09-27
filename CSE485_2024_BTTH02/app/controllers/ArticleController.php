<!-- Hoàng Quốc Bảo -->
<?php
require_once("./app/models/ArticleModel.php");
require_once("./app/services/ArticleService.php");

class ArticleController {
    private $articleService;

    public function __construct() {
        $this->articleService = new ArticleService();
    }

    // Hàm xử lý hành động index
    public function index() {
        // Lấy danh sách bài viết từ service
        $articles = $this->articleService->getAllArticles();
        
        // Tương tác với View
        include("./app/views/article/list_article.php");
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Nhận dữ liệu từ POST
            $tieude = $_POST['tieude'] ?? null;
            $tenbhat = $_POST['tenbhat'] ?? null;
            $matloai = $_POST['matloai'] ?? null;
            $tomtat = $_POST['tomtat'] ?? null;
            $matgia = $_POST['matgia'] ?? null;
            $ngayviet = $_POST['ngayviet'] ?? null;
            $hinhanh = $_FILES['hinhanh']['name'] ?? null;

            // Xử lý upload hình ảnh
            if (isset($_FILES['hinhanh'])) { // Dùng hàm isset() để kiểm tra dữ liệu có tồn tại
                $hinhanh_name = basename($_FILES['hinhanh']['name']); // Lấy tên file
                $targetDirectory = "public/images/songs/"; // Thư mục lưu trữ file upload
                $targetFile = $targetDirectory . $hinhanh_name; // Đường dẫn mới
                
                // Thực hiện upload
                if (!move_uploaded_file($_FILES['hinhanh']['tmp_name'], $targetFile)) {
                    echo "Failed to move uploaded file: " . $_FILES['hinhanh']['error'];
                    return;
                }
            }


            // Kiểm tra dữ liệu
            if ($matloai == null || $matgia == null) {
                echo "<script>alert('Mời nhập đầy đủ mã thể loại và mã tác giả'); window.location.href = 'index.php?controller=article&action=create';</script>";
                return;
            }

            // Kiểm tra mã thể loại và mã tác giả
            if (!$this->articleService->checkCategoryExists($matloai)) {
                echo "<script>alert('Mã thể loại không tồn tại. Vui lòng nhập lại.'); window.location.href = 'index.php?controller=article&action=create';</script>";
                return;
            }

            if (!$this->articleService->checkAuthorExists($matgia)) {
                echo "<script>alert('Mã tác giả không tồn tại. Vui lòng nhập lại.'); window.location.href = 'index.php?controller=article&action=create';</script>";
                return;
            }

            // Thêm bài viết vào database
            if ($this->articleService->addArticle($tieude, $tenbhat, $matloai, $tomtat, $matgia, $ngayviet, $hinhanh_name)) {
                echo "<script>alert('Thêm bài viết thành công'); window.location.href = 'index.php?controller=article&action=index';</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm bài viết');</script>";
            }
        }
    
        include("./app/views/article/add_article.php");
    }

    // Hàm xử lý chỉnh sửa bài viết
    public function edit($id) {
        // Lấy bài viết từ service
        $article = $this->articleService->getArticleById($id);
        
        // Kiểm tra xem bài viết có tồn tại hay không
        if (!$article) {
            echo "Bài viết không tồn tại.";
            return;
        }

        // Tương tác với View
        include("./app/views/article/edit_article.php");
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mabviet = $_POST['mabviet'];
            $tieude = $_POST['tieude'];
            $tenbhat = $_POST['tenbhat'];
            $matloai = $_POST['matloai'];
            $tomtat = $_POST['tomtat'];
            $matgia = $_POST['matgia'];
            $ngayviet = $_POST['ngayviet'];
            
            // Khởi tạo biến để lưu tên hình ảnh
            $hinhanh_name = null;
    
            // Lấy bài viết hiện tại để kiểm tra hình ảnh cũ
            $article = $this->articleService->getArticleById($mabviet);
            
            // Nếu có file upload
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
                // Lấy tên file upload mới
                $hinhanh_name = basename($_FILES['hinhanh']['name']);
                $targetDirectory = "public/images/songs/"; // Thư mục lưu file
                $targetFile = $targetDirectory . $hinhanh_name;
    
                // Di chuyển file upload mới vào thư mục đích
                if (!move_uploaded_file($_FILES['hinhanh']['tmp_name'], $targetFile)) {
                    echo "Failed to move uploaded file: " . $_FILES['hinhanh']['error'];
                    return;
                }
            } else {
                // Không có file mới, giữ lại tên file hình ảnh cũ
                $hinhanh_name = $article->getHinhanh();
            }
    
            // Kiểm tra dữ liệu nhập vào
            if (empty($matloai) || empty($tieude) || empty($tomtat) || empty($matgia) || empty($ngayviet)) {
                echo "<script>alert('Bạn chưa nhập đầy đủ thông tin'); window.history.back();</script>";
                return;
            }
    
            // Kiểm tra mã thể loại và mã tác giả có tồn tại không
            if (!$this->articleService->checkCategoryExists($matloai)) {
                echo "<script>alert('Mã thể loại không tồn tại. Vui lòng nhập lại.'); window.history.back();</script>";
                return;
            }
    
            if (!$this->articleService->checkAuthorExists($matgia)) {
                echo "<script>alert('Mã tác giả không tồn tại. Vui lòng nhập lại.'); window.history.back();</script>";
                return;
            }
    
            // Tạo đối tượng ArticleModel với thông tin cập nhật
            $article = new ArticleModel($tieude, $tenbhat, $matloai, $mabviet, $tomtat, $matgia, $ngayviet, $hinhanh_name);
    
            // Cập nhật bài viết
            if ($this->articleService->updateArticle($article)) {
                echo "<script>alert('Cập nhật bài viết thành công'); window.location.href = 'index.php?controller=article&action=index';</script>";
            } else {
                echo "<script>alert('Lỗi khi cập nhật bài viết.'); window.history.back();</script>";
            }
        }
    }

    // Hàm xử lý xóa bài viết
    public function delete($id) {
        if ($this->articleService->deleteArticle($id)) {
            header("Location: index.php?controller=article&action=index");
            exit();
        } else {
            echo "<h1>Lỗi khi xóa bài viết.</h1>";
        }
    }
}
?>
