
<?php
include '../connect.php';
$matloai = $_GET['id'];
$xoa_sql = "DELETE FROM theloai WHERE ma_tloai=$matloai";
mysqli_query($conn, $xoa_sql);
echo"<h1>Xóa thành công</h1>";
header("Location: category.php");
?>
