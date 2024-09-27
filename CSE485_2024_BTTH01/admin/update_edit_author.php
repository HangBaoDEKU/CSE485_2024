<?php
include '../db.php';

$matgia = $_POST['matgia'];
$tentgia = $_POST['tentgia'];

if($tentgia == NULL ){
    echo "Bạn chưa nhập đầy đủ thông tin";
}
else{
    $updatesql = "UPDATE tacgia SET
    ten_tgia = '$tentgia'
    WHERE ma_tgia='$matgia' ";
    mysqli_query($conn, $updatesql);
    header("Location: author.php");
}
