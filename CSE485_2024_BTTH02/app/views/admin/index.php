<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../../../public/css/style_.css">
</head>
<body>
    <?php include './app/views/layout/header_indexview.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Người dùng</h5>
                        <h5 class="h1 text-center"><?php echo $count_users; ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Thể loại</h5>
                        <h5 class="h1 text-center"><?php echo $count_theloai; ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tác giả</h5>
                        <h5 class="h1 text-center"><?php echo $count_tacgia; ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Bài viết</h5>
                        <h5 class="h1 text-center"><?php echo $count_baiviet; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include './app/views/layout/footer_indexview.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
