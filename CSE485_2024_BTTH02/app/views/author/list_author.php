<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Administration</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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

    <main class="container mt-5 mb-5">
        <h3 class="text-center">Danh Sách Tác Giả</h3>
        <a href="index.php?controller=author&action=create" class="btn btn-success">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Mã Tác Giả</th>
                    <th scope="col">Tên Tác Giả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($authors)) {
                    foreach ($authors as $author) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($author->getMaTgia()); ?></td>
                            <td><?php echo htmlspecialchars($author->getTenTgia()); ?></td>
                            <td>
                                <a href="?controller=author&action=edit&id=<?= htmlspecialchars($author->getMaTgia()) ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có muốn xóa tác giả này không?');" href="index.php?controller=author&action=delete&id=<?= htmlspecialchars($author->getMaTgia()) ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Chưa có tác giả nào!</td></tr>";
                } ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
