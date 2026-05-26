<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

// 🔥 Đổi DESC -> ASC để ID tăng dần
$students = $db->fetchAll('SELECT * FROM students ORDER BY id ASC');

$successMessage = '';
if (isset($_GET['success'])) {
    $successMessage = 'Thêm sinh viên thành công!';
} elseif (isset($_GET['updated'])) {
    $successMessage = 'Cập nhật sinh viên thành công!';
} elseif (isset($_GET['deleted'])) {
    $successMessage = 'Xóa sinh viên thành công!';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .container-box {
            max-width: 900px;
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

        <h3 class="mb-3">👨‍🎓 Quản lý sinh viên</h3>

        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($successMessage) ?>
            </div>
        <?php endif; ?>

        <div class="mb-3 d-flex justify-content-between">
            <a href="create.php" class="btn btn-success">+ Thêm sinh viên</a>
            <a href="../index.php" class="btn btn-secondary">← Trang chủ</a>
        </div>

        <table class="table table-bordered table-hover text-center align-middle bg-white">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['id'] ?></td>
                        <td><?= htmlspecialchars($student['name']) ?></td>
                        <td><?= htmlspecialchars($student['email']) ?></td>
                        <td><?= $student['created_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="delete.php?id=<?= $student['id'] ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa?');"
                               class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>

</body>
</html>