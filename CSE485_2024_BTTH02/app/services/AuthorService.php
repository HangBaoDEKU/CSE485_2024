<?php
require_once("./configs/DBConnection.php");
require_once("./app/models/AuthorModel.php");

class AuthorService {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }

    public function getAllAuthors() {
        $sql = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $stmt = $this->dbConnection->getConnection()->query($sql);

        $authors = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $author = new AuthorModel(
                $row['ma_tgia'],
                $row['ten_tgia']
            );
            $authors[] = $author;
        }
        return $authors;
    }

    public function addAuthor($ten_tgia) {
        $sql = "INSERT INTO tacgia (ten_tgia) VALUES (?)";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([$ten_tgia]);
    }

    public function getAuthorById($id) {
        $sql = "SELECT * FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new AuthorModel($row['ma_tgia'], $row['ten_tgia']);
        }

        return null; 
    }

    public function updateAuthor(AuthorModel $author) {
        $sql = "UPDATE tacgia SET ten_tgia = ? WHERE ma_tgia = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([
            $author->getTenTgia(),
            $author->getMaTgia()
        ]);
    }

    public function deleteAuthor($id) {
        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
