<?php
include '../connect.php';

$mabviet = $_POST['mabviet'];
$tieude = $_POST['tieude'];
$tenbhat = $_POST['tenbhat'];
$matloai = $_POST['matloai'];
$tomtat = $_POST['tomtat'];
$matgia = $_POST['matgia'];
$ngayviet = $_POST['ngayviet'];

if ($matloai == NULL || $tieude == NULL || $tomtat == NULL || $matgia == NULL || $ngayviet == NULL) {
    echo "Bạn chưa nhập đầy đủ thông tin";
} else {
    $check_tloai_sql = "SELECT * FROM theloai WHERE ma_tloai = '$matloai'";
    $result_tloai = mysqli_query($conn, $check_tloai_sql);

    $check_tgia_sql = "SELECT * FROM tacgia WHERE ma_tgia = '$matgia'";
    $result_tgia = mysqli_query($conn, $check_tgia_sql);

    if (mysqli_num_rows($result_tloai) > 0 && mysqli_num_rows($result_tgia) > 0) {
        $updatesql = "UPDATE baiviet SET
            tieude = '$tieude',
            ten_bhat = '$tenbhat',
            ma_tloai = '$matloai',
            tomtat = '$tomtat',
            ma_tgia = '$matgia',
            ngayviet = '$ngayviet'
            WHERE ma_bviet = '$mabviet'";

        if (mysqli_query($conn, $updatesql)) {

            header("Location: article.php");
            exit();
        } else {
            echo "Lỗi khi cập nhật bài viết: " . mysqli_error($conn);
        }
    } else {
        echo "Mã thể loại hoặc mã tác giả không tồn tại. Vui lòng kiểm tra lại.";
    }
}
?>