<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

// 🔥 Có thể đổi ASC nếu muốn tăng dần
$sql = 'SELECT e.id,
               s.name  AS student_name,
               s.email,
               c.title AS course_title,
               e.enrolled_at
        FROM enrollments e
        JOIN students s ON e.student_id = s.id
        JOIN courses  c ON e.course_id  = c.id
        ORDER BY e.enrolled_at DESC';

$enrollments = $db->fetchAll($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đăng ký học</title>

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

        <h3 class="mb-3">📝 Quản lý đăng ký học</h3>

        <div class="mb-3 d-flex justify-content-between">
            <a href="create.php" class="btn btn-success">+ Thêm đăng ký</a>
            <a href="../index.php" class="btn btn-secondary">← Trang chủ</a>
        </div>

        <table class="table table-bordered table-hover text-center align-middle bg-white">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Sinh viên</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                    <th>Thời gian</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($enrollments as $enroll): ?>
                    <tr>
                        <td><?= $enroll['id'] ?></td>
                        <td><?= htmlspecialchars($enroll['student_name']) ?></td>
                        <td><?= htmlspecialchars($enroll['email']) ?></td>
                        <td><?= htmlspecialchars($enroll['course_title']) ?></td>
                        <td><?= $enroll['enrolled_at'] ?></td>
                        <td>
                            <a href="delete.php?id=<?= $enroll['id'] ?>"
                               onclick="return confirm('Hủy đăng ký này?');"
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