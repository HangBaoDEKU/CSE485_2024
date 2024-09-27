<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Thể Loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
    <?php include './app/views/layout/header_indexview.php'; ?>

    <main class="container mt-5 mb-5">
        <h3 class="text-center">Danh Sách Thể Loại</h3>
        <a href="index.php?controller=category&action=create" class="btn btn-success">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Mã Thể Loại</th>
                    <th scope="col">Tên Thể Loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)) {
                    foreach ($categories as $category) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($category->getMaTloai()); ?></td>
                            <td><?php echo htmlspecialchars($category->getTenTloai()); ?></td>
                            <td>
                                <a href="?controller=category&action=edit&id=<?= htmlspecialchars($category->getMaTloai()) ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có muốn xóa thể loại này không?');" href="index.php?controller=category&action=delete&id=<?= htmlspecialchars($category->getMaTloai()) ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Chưa có thể loại nào!</td></tr>";
                } ?>
            </tbody>
        </table>
    </main>

    <?php include './app/views/layout/footer_indexview.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
