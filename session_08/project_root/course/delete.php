<?php
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // DELETE bằng method của bạn
    $db->delete('courses', 'id = ?', [$id]);
}

header("Location: index.php");
exit;