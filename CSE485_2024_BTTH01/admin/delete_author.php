<?php
include '../connect.php';
$matgia = $_GET['id'];
$xoa_sql = "DELETE FROM tacgia WHERE ma_tgia=$matgia";
mysqli_query($conn, $xoa_sql);
echo"<h1>Xóa thành công</h1>";
header("Location: author.php");
?>