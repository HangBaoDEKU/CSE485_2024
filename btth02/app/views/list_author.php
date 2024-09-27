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
    <?php include './app/views/layout/header_indexview.php'; ?>

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

    <?php include './app/views/layout/footer_indexview.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>