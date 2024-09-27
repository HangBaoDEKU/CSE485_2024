<?php
require_once("./configs/DBConnection.php");
require_once("./app/models/DetailModel.php");

class DetailService {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DBConnection();
    }


    public function getDetailById($id) {
        $sql = "SELECT  tieude, ten_bhat, ten_tloai, tomtat, noidung, ten_tgia,  hinhanh  
                FROM baiviet 
                JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia 
                JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai 
                WHERE ma_bviet = ?";
        $stmt = $this->dbConnection->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? new DetailModel(
            $row['tieude'],
            $row['ten_bhat'],
            $row['ten_tloai'],
            $row['tomtat'],
            $row['noidung'],
            $row['ten_tgia'],
            $row['hinhanh']
        ) : null;
    }

}
?>