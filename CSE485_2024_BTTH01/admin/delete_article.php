<?php
include '../connect.php';
$mabviet = $_GET['id'];
$xoa_sql = "DELETE FROM baiviet WHERE ma_bviet=$mabviet";
mysqli_query($conn, $xoa_sql);
echo"<h1>Xóa thành công</h1>";
header("Location: article.php");
?>