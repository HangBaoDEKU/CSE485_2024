<?php
require_once("./configs/DBConnection.php");
require_once("./app/models/CategoryModel.php");

class CategoryService {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

    public function getAllCategories() {
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
        $stmt = $this->dbConnection->getConnection()->query($sql);

        $categories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = new CategoryModel(
                $row['ma_tloai'],
                $row['ten_tloai']
            );
            $categories[] = $category;
        }
        return $categories;
    }

    public function addCategory($ten_tloai) {
        $sql = "INSERT INTO theloai (ten_tloai) VALUES (?)";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([$ten_tloai]);
    }

    public function getCategoryById($id) {
        $sql = "SELECT * FROM theloai WHERE ma_tloai = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new CategoryModel($row['ma_tloai'], $row['ten_tloai']);
        }

        return null; 
    }

    public function updateCategory(CategoryModel $category) {
        $sql = "UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([
            $category->getTenTloai(),
            $category->getMaTloai()
        ]);
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM theloai WHERE ma_tloai = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>