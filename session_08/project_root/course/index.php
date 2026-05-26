<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

// 🔥 Đổi DESC -> ASC nếu muốn ID tăng dần
$courses = $db->fetchAll('SELECT * FROM courses ORDER BY id ASC');

$successMessage = '';
if (isset($_GET['success'])) {
    $successMessage = 'Thêm khóa học thành công!';
} elseif (isset($_GET['updated'])) {
    $successMessage = 'Cập nhật khóa học thành công!';
} elseif (isset($_GET['deleted'])) {
    $successMessage = 'Xóa khóa học thành công!';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý khóa học</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .container-box {
            max-width: 1000px;
            margin: 50px auto;
        }

        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="container-box">

    <div class="card shadow p-4">

        <h3 class="mb-3">📚 Quản lý khóa học</h3>

        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($successMessage) ?>
            </div>
        <?php endif; ?>

        <div class="mb-3 d-flex justify-content-between">
            <a href="create.php" class="btn btn-success">+ Thêm khóa học</a>
            <a href="../index.php" class="btn btn-secondary">← Trang chủ</a>
        </div>

        <table class="table table-bordered table-hover text-center align-middle bg-white">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course['id'] ?></td>
                    <td><?= htmlspecialchars($course['title']) ?></td>
                    <td><?= htmlspecialchars($course['description'] ?? '—') ?></td>
                    <td><?= $course['created_at'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $course['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="delete.php?id=<?= $course['id'] ?>"
                           onclick="return confirm('Bạn chắc chắn muốn xóa khóa học này?');"
                           class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if (empty($courses)): ?>
                <tr>
                    <td colspan="5" class="text-center">
                        Chưa có khóa học nào.
                        <a href="create.php">➕ Thêm ngay</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>

        </table>

    </div>

</div>

</body>
</html>