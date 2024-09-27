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

// Hàm xử lý thêm bài viết mới
public function create() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tieude = $_POST['tieude'] ?? null;
        $tenbhat = $_POST['tenbhat'] ?? null;
        $matloai = $_POST['matloai'] ?? null;
        $tomtat = $_POST['tomtat'] ?? null;
        $matgia = $_POST['matgia'] ?? null;
        $ngayviet = $_POST['ngayviet'] ?? null;
        

        // Kiểm tra dữ liệu
        if ($matloai == null || $matgia == null) {
            echo "<script>alert('Mời nhập đầy đủ mã thể loại và mã tác giả'); window.location.href = 'index.php?controller=article&action=create';</script>";
            return;
        }

        // Truy vấn kiểm tra xem mã thể loại có tồn tại không
        if (!$this->articleService->checkCategoryExists($matloai)) {
            echo "<script>alert('Mã thể loại không tồn tại. Vui lòng nhập lại.'); window.location.href = 'index.php?controller=article&action=create';</script>";
            return;
        }

        // Truy vấn kiểm tra xem mã tác giả có tồn tại không
        if (!$this->articleService->checkAuthorExists($matgia)) {
            echo "<script>alert('Mã tác giả không tồn tại. Vui lòng nhập lại.'); window.location.href = 'index.php?controller=article&action=create';</script>";
            return;
        }

        // Thêm bài viết vào database
        if ($this->articleService->addArticle($tieude, $tenbhat, $matloai, $tomtat, $matgia, $ngayviet)) {
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
            return; // Hoặc bạn có thể chuyển hướng đến một trang khác
        }
    
        // Tương tác với View
        include("./app/views/article/edit_article.php");
    }

       // Hàm xử lý cập nhật bài viết
public function update() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mabviet = $_POST['mabviet'];
        $tieude = $_POST['tieude'];
        $tenbhat = $_POST['tenbhat'];
        $matloai = $_POST['matloai'];
        $tomtat = $_POST['tomtat'];
        $matgia = $_POST['matgia'];
        $ngayviet = $_POST['ngayviet'];

        // Kiểm tra dữ liệu
        if ($matloai == NULL || $tieude == NULL || $tomtat == NULL || $matgia == NULL || $ngayviet == NULL) {
            echo "Bạn chưa nhập đầy đủ thông tin";
            return;
        }

        // Kiểm tra mã thể loại và mã tác giả
        if (!$this->articleService->checkCategoryExists($matloai)) {
            echo "<script>alert('Mã thể loại không tồn tại. Vui lòng nhập lại.');window.location.href = 'index.php?controller=article&action=index';</script>";
            return;
        }

        if (!$this->articleService->checkAuthorExists($matgia)) {
            echo "<script>alert('Mã tác giả không tồn tại. Vui lòng nhập lại.');window.location.href = 'index.php?controller=article&action=index';</script>";
            return;
        }

        // Tạo đối tượng ArticleModel
        $article = new ArticleModel($tieude, $tenbhat, $matloai, $mabviet, $tomtat, $matgia, $ngayviet);

        // Cập nhật bài viết
        if ($this->articleService->updateArticle($article)) {
            header("Location: index.php?controller=article&action=index");
            exit();
        } else {
            echo "Lỗi khi cập nhật bài viết.";
        }
    }
}


    // Hàm xử lý xóa bài viết

    public function delete($id) {
        if ($this->articleService->deleteArticle($id)) {
            // Xóa thành công, chuyển hướng về danh sách bài viết
            header("Location: index.php?controller=article&action=index");
            exit();
        } else {
            // Xử lý lỗi nếu xóa không thành công
            echo "<h1>Lỗi khi xóa bài viết.</h1>";
        }
    }

    }
?>