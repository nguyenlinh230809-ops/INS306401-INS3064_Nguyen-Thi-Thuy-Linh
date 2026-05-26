<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy course
$course = $db->fetch("SELECT * FROM courses WHERE id = ?", [$id]);

if (!$course) {
    die("Course not found");
}

$title = $course['title'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';

    if ($title === '') {
        $error = "Title is required";
    } else {
        // UPDATE bằng method của bạn
        $db->update('courses', [
            'title' => $title
        ], 'id = ?', [$id]);

        header("Location: index.php");
        exit;
    }
}
?>

<h2>Edit Course</h2>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>">
    <br><br>
    <button type="submit">Update</button>
</form>

<p style="color:red"><?= $error ?></p>