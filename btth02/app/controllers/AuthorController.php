<?php
require_once("./app/models/AuthorModel.php");
require_once("./app/services/AuthorService.php");

class AuthorController {
    private $authorService;

    public function __construct() {
        $this->authorService = new AuthorService();
    }

    // Handle the index action
    public function index() {
        $authors = $this->authorService->getAllAuthors();
        
        // Interact with the View
        include("./app/views/author/list_author.php");
    }

    // Handle the create action
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tgia = $_POST['tentgia'] ?? null;

            // Validate data
            if (empty($ten_tgia)) {
                echo "<script>alert('Mời nhập tên tác giả'); window.location.href = 'index.php?controller=author&action=create';</script>";
                return;
            }

            // Add author to the database
            if ($this->authorService->addAuthor($ten_tgia)) {
                echo "<script>alert('Thêm tác giả thành công'); window.location.href = 'index.php?controller=author&action=index';</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm tác giả');</script>";
            }
        }

        include("./app/views/author/add_author.php");
    }

    // Handle the edit action
    public function edit($id) {
        // Validate ID
        if (!is_numeric($id)) {
            echo "ID không hợp lệ.";
            return;
        }

        // Get author from service
        $author = $this->authorService->getAuthorById($id);

        if (!$author) {
            echo "Tác giả không tồn tại.";
            return;
        }

        // Interact with the View
        include("./app/views/author/edit_author.php");
    }

    // Handle the update action
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matgia = $_POST['matgia'];
            $tentgia = $_POST['tentgia'];

            // Validate data
            if ($matgia == NULL || $tentgia == NULL) {
                echo "Bạn chưa nhập đầy đủ thông tin";
            } else {
                $author = new AuthorModel($matgia, $tentgia);
                
                // Update author
                if ($this->authorService->updateAuthor($author)) {
                    header("Location: index.php?controller=author&action=index");
                    exit();
                } else {
                    echo "Lỗi khi cập nhật tác giả.";
                }
            }
        }
    }

    // Handle the delete action
    public function delete($id) {
        // Validate ID
        if (!is_numeric($id)) {
            echo "ID không hợp lệ.";
            return;
        }

        if ($this->authorService->deleteAuthor($id)) {
            header("Location: index.php?controller=author&action=index");
            exit();
        } else {
            echo "<h1>Lỗi khi xóa tác giả.</h1>";
        }
    }
}
?>