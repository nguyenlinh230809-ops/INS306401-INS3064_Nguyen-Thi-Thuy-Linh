<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

$name = '';
$email = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($name === '' || $email === '') {
        $error = "Vui lòng nhập đầy đủ thông tin";
    } else {
        $db->insert('students', [
            'name' => $name,
            'email' => $email
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
    <title>Thêm sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .box { max-width: 500px; margin: 60px auto; }
    </style>
</head>

<body>
<div class="box">
    <div class="card shadow p-4">
        <h3>➕ Thêm sinh viên</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Họ tên</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>">
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