<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=author&action=index">Danh sách tác giả</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="container mt-4">
        <h2 class="mb-4">Chỉnh sửa tác giả</h2>
        <form method="POST" action="?controller=author&action=update">
            <input type="hidden" name="matgia" value="<?= $author->getMaTgia() ?>">

            <div class="mb-3">
                <label for="tentgia" class="form-label">Tên tác giả:</label>
                <input type="text" class="form-control" id="tentgia" name="tentgia" value="<?= $author->getTenTgia() ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="?controller=author&action=index" class="btn btn-secondary">Quay lại</a>
        </form>
    </main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>