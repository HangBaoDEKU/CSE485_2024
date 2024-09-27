<?php
require_once("./configs/DBConnection.php");
require_once("./app/models/ArticleModel.php");

class ArticleService {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

    public function getAllArticles() {
        $sql = "SELECT ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet, hinhanh FROM baiviet";
        $stmt = $this->dbConnection->getConnection()->query($sql);

        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $article = new ArticleModel(
                $row['tieude'],
                $row['ten_bhat'],
                $row['ma_tloai'],
                $row['ma_bviet'],
                $row['tomtat'],
                $row['ma_tgia'],
                $row['ngayviet'],
                $row['hinhanh']
            );
            $articles[] = $article;
        }
        return $articles;
    }

    public function addArticle($tieude, $tenbhat, $matloai, $tomtat, $matgia, $ngayviet, $hinhanh) {
        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet, hinhanh) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([$tieude, $tenbhat, $matloai, $tomtat, $matgia, $ngayviet, $hinhanh]);
    }

    public function updateArticle(ArticleModel $article) {
        $sql = "UPDATE baiviet SET tieude = ?, ten_bhat = ?, ma_tloai = ?, tomtat = ?, ma_tgia = ?, ngayviet = ?, hinhanh = ? WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([
            $article->getTieude(),
            $article->getTenBhat(),
            $article->getMaTloai(),
            $article->getTomtat(),
            $article->getMaTgia(),
            $article->getNgayviet(),
            $article->getHinhanh(),
            $article->getMaBviet()
        ]);
    }

    public function deleteArticle($id) {
        $sql = "DELETE FROM baiviet WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getArticleById($id) {
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? new ArticleModel(
            $row['tieude'],
            $row['ten_bhat'],
            $row['ma_tloai'],
            $row['ma_bviet'],
            $row['tomtat'],
            $row['ma_tgia'],
            $row['ngayviet'],
            $row['hinhanh']
        ) : null;
    }

    public function checkCategoryExists($matloai) {
        // Kiểm tra sự tồn tại của mã thể loại
        $sql = "SELECT COUNT(*) FROM theloai WHERE ma_tloai = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$matloai]);
        return $stmt->fetchColumn() > 0;
    }

    public function checkAuthorExists($matgia) {
        // Kiểm tra sự tồn tại của mã tác giả
        $sql = "SELECT COUNT(*) FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$matgia]);
        return $stmt->fetchColumn() > 0;
    }
}
?>
