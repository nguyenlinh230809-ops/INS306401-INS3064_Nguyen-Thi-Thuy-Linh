<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

$students = $db->fetchAll("SELECT * FROM students");
$courses  = $db->fetchAll("SELECT * FROM courses");

$student_id = '';
$course_id = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'] ?? '';
    $course_id  = $_POST['course_id'] ?? '';

    if ($student_id === '' || $course_id === '') {
        $error = "Vui lòng chọn đầy đủ thông tin";
    } else {
        $db->insert('enrollments', [
            'student_id' => $student_id,
            'course_id'  => $course_id
        ]);

        header("Location: index.php?success=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .box { max-width: 500px; margin: 60px auto; }
    </style>
</head>

<body>
<div class="box">
    <div class="card shadow p-4">
        <h3>➕ Thêm đăng ký học</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label>Sinh viên</label>
                <select name="student_id" class="form-control">
                    <option value="">-- Chọn sinh viên --</option>
                    <?php foreach ($students as $s): ?>
                        <option value="<?= $s['id'] ?>">
                            <?= htmlspecialchars($s['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Khóa học</label>
                <select name="course_id" class="form-control">
                    <option value="">-- Chọn khóa học --</option>
                    <?php foreach ($courses as $c): ?>
                        <option value="<?= $c['id'] ?>">
                            <?= htmlspecialchars($c['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">← Quay lại</a>
                <button class="btn btn-success">Lưu</button>
            </div>

        </form>
    </div>
</div>
</body>
</html>