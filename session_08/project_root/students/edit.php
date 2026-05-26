<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$errors = [];

try {
    $student = $db->fetch('SELECT * FROM students WHERE id = ?', [$id]);
    if (!$student) {
        header('Location: index.php');
        exit;
    }
} catch (Exception $e) {
    die('Không lấy được dữ liệu sinh viên.');
}

$name  = $student['name'];
$email = $student['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($name === '') {
        $errors['name'] = 'Vui lòng nhập họ tên.';
    }

    if ($email === '') {
        $errors['email'] = 'Vui lòng nhập email.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email không hợp lệ.';
    }

    if (empty($errors)) {
        try {
            $existing = $db->fetch(
                'SELECT id FROM students WHERE email = ? AND id <> ?',
                [$email, $id]
            );

            if ($existing) {
                $errors['email'] = 'Email đã tồn tại.';
            } else {
                $db->update('students', [
                    'name'  => $name,
                    'email' => $email,
                ], 'id = ?', [$id]);

                header('Location: index.php?updated=1');
                exit;
            }
        } catch (Exception $e) {
            $errors['general'] = 'Có lỗi khi cập nhật.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border-radius: 15px;
        }

        .header {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="card shadow p-4">
        <h3 class="mb-4">✏️ Sửa sinh viên</h3>

        <?php if (!empty($errors['general'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($errors['general']) ?>
            </div>
        <?php endif; ?>

        <form method="post">

            <!-- NAME -->
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="name"
                       class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($name) ?>">

                <?php if (!empty($errors['name'])): ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['name']) ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email"
                       class="form-control <?= !empty($errors['email']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($email) ?>">

                <?php if (!empty($errors['email'])): ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['email']) ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">← Quay lại</a>
                <button type="submit" class="btn btn-primary">💾 Cập nhật</button>
            </div>

        </form>
    </div>

</div>

</body>
</html>