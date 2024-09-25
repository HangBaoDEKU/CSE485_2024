<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa bài viết</title>
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
                        <li class="nav-item"><a class="nav-link" href="?controller=article&action=index">Danh sách bài viết</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="container mt-4">
        <h2 class="mb-4">Chỉnh sửa bài viết</h2>
        <form method="POST" action="?controller=article&action=update">
            <input type="hidden" name="mabviet" value="<?= $article->getMaBviet() ?>">
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="tieude" name="tieude" value="<?= htmlspecialchars($article->getTieude()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="tenbhat" class="form-label">Tên tác giả:</label>
                <input type="text" class="form-control" id="tenbhat" name="tenbhat" value="<?= htmlspecialchars($article->getTenBhat()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="matloai" class="form-label">Mã thể loại:</label>
                <input type="text" class="form-control" id="matloai" name="matloai" value="<?= htmlspecialchars($article->getMaTloai()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt:</label>
                <textarea class="form-control" id="tomtat" name="tomtat" rows="3" required><?= htmlspecialchars($article->getTomtat()) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="matgia" class="form-label">Mã tác giả:</label>
                <input type="text" class="form-control" id="matgia" name="matgia" value="<?= htmlspecialchars($article->getMaTgia()) ?>" required>
            </div>
            <div class="mb-3">
                <label for="ngayviet" class="form-label">Ngày viết:</label>
                <input type="date" class="form-control" id="ngayviet" name="ngayviet" 
       value="<?= htmlspecialchars(date('Y-m-d', strtotime($article->getNgayviet()))) ?>" required>

            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="?controller=article&action=index" class="btn btn-secondary">Quay lại</a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>