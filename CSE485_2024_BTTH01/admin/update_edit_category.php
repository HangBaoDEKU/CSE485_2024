<?php
include '../db.php';

$matloai = $_POST['matloai'];
$tentloai = $_POST['tentloai'];

if($tentloai == NULL ){
    echo "Bạn chưa nhập đầy đủ thông tin";
}
else{
    $updatesql = "UPDATE theloai SET
    ten_tloai = '$tentloai'
    WHERE ma_tloai='$matloai' ";
    mysqli_query($conn, $updatesql);
    header("Location: category.php");
}













