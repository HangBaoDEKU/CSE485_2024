<?php
require_once("./configs/DBConnection.php");
require_once("./app/models/ArticleModel.php");

class ArticleService {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

    public function getAllArticles() {
        $sql = "SELECT ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet FROM baiviet";
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
                $row['ngayviet']
            );
            $articles[] = $article;
        }
        return $articles;
    }

    public function addArticle($tieude, $tenbhat, $matloai, $tomtat, $matgia, $ngayviet) {
        $themsql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->dbConnection->getConnection()->prepare($themsql);
        return $stmt->execute([$tieude, $tenbhat, $matloai, $tomtat, $matgia, $ngayviet]);
    }

    public function getArticleById($id) {
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new ArticleModel(
                $row['tieude'],
                $row['ten_bhat'],
                $row['ma_tloai'],
                $row['ma_bviet'],
                $row['tomtat'],
                $row['ma_tgia'],
                $row['ngayviet']
            );
        }

        return null; // Nếu không tìm thấy
    }

    // Kiểm tra xem mã thể loại có tồn tại trong cơ sở dữ liệu không
    public function checkCategoryExists($matloai) {
        $sql = "SELECT COUNT(*) FROM theloai WHERE ma_tloai = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$matloai]);
        return $stmt->fetchColumn() > 0;
    }

    // Kiểm tra xem mã tác giả có tồn tại trong cơ sở dữ liệu không
    public function checkAuthorExists($matgia) {
        $sql = "SELECT COUNT(*) FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$matgia]);
        return $stmt->fetchColumn() > 0;
    }


    public function updateArticle(ArticleModel $article) {
        $sql = "UPDATE baiviet SET tieude = ?, ten_bhat = ?, ma_tloai = ?, tomtat = ?, ma_tgia = ?, ngayviet = ? WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([
            $article->getTieude(),
            $article->getTenBhat(),
            $article->getMaTloai(),
            $article->getTomtat(),
            $article->getMaTgia(),
            $article->getNgayviet(),
            $article->getMaBviet()
        ]);
    }

    // app/services/ArticleService.php

    public function deleteArticle($id) {
        $delete_sql = "DELETE FROM baiviet WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($delete_sql);
        return $stmt->execute([$id]);
    }
    

}
?>