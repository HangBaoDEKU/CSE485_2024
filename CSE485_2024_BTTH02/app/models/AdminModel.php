
<?php
class AdminModel {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function getUserCount() {
        $sql = "SELECT COUNT(user_id) AS count_users FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC)['count_users'];
    }

    public function getCategoryCount() {
        $sql = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC)['count_theloai'];
    }

    public function getAuthorCount() {
        $sql = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC)['count_tacgia'];
    }

    public function getArticleCount() {
        $sql = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC)['count_baiviet'];
    }
}
?>
