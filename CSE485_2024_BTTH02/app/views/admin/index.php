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
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=admin&action=index">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang ngoài</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="index.php?controller=category&action=index">Thể loại</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=author&action=index">Tác giả</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=article&action=index">Bài viết</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
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
    <footer class="bg-light text-center p-3">
        <h4>TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
