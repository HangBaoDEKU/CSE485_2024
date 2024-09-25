<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php
    require_once '../connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tieude = isset($_POST['tieude']) ? $_POST['tieude'] : null;
        $tenbhat = isset($_POST['tenbhat']) ? $_POST['tenbhat'] : null;
        $matloai = isset($_POST['matloai']) ? $_POST['matloai'] : null;
        $tomtat = isset($_POST['tomtat']) ? $_POST['tomtat'] : null;
        $matgia = isset($_POST['matgia']) ? $_POST['matgia'] : null;
        $ngayviet = isset($_POST['ngayviet']) ? $_POST['ngayviet'] : null;

        // Kiểm tra nếu mã thể loại hoặc mã tác giả không được nhập
        if ($matloai == null || $matgia == null) {
            ?>
            <script>
                alert("Mời nhập đầy đủ mã thể loại và mã tác giả");
                window.location.href = "add_article.php";
            </script>
            <?php
        } else {
            // Truy vấn kiểm tra xem mã thể loại có tồn tại không
            $check_tloai_sql = "SELECT * FROM theloai WHERE ma_tloai = '$matloai'";
            $result_tloai = mysqli_query($conn, $check_tloai_sql);

            // Truy vấn kiểm tra xem mã tác giả có tồn tại không
            $check_tgia_sql = "SELECT * FROM tacgia WHERE ma_tgia = '$matgia'";
            $result_tgia = mysqli_query($conn, $check_tgia_sql);

            // Kiểm tra sự tồn tại của cả mã thể loại và mã tác giả
            if (mysqli_num_rows($result_tloai) > 0 && mysqli_num_rows($result_tgia) > 0) {
                // Thực hiện câu lệnh INSERT nếu cả mã thể loại và mã tác giả đều tồn tại
                $themsql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
                            VALUES ('$tieude', '$tenbhat', '$matloai', '$tomtat', '$matgia', '$ngayviet')";

                if (mysqli_query($conn, $themsql)) {
                    ?>
                    <script>
                        alert("Thêm bài viết thành công");
                        window.location.href = "article.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("Lỗi khi thêm bài viết");
                    </script>
                    <?php
                }
            } else {
                // Nếu mã thể loại hoặc mã tác giả không tồn tại
                ?>
                <script>
                    alert("Mã thể loại hoặc mã tác giả không tồn tại. Vui lòng nhập lại.");
                    window.location.href = "add_article.php";
                </script>
                <?php
            }
        }
    }
    ?>


    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="add_article.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tên bài hát</span>
                        <input type="text" class="form-control" name="tenbhat" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Mã thể loại</span>
                        <input type="text" class="form-control" name="matloai" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tóm tắt</span>
                        <textarea name="tomtat" rows="5" cols="160"></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Mã tác giả</span>
                        <input type="text" class="form-control" name="matgia" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Ngày viết</span>
                        <input type="date" class="form-control" name="ngayviet" >
                    </div>
                    

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>