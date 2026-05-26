<?php
require_once __DIR__ . '/classes/Database.php';

$db = Database::getInstance();

$totalStudents = $db->fetch("SELECT COUNT(*) as total FROM students")['total'] ?? 0;
$totalCourses = $db->fetch("SELECT COUNT(*) as total FROM courses")['total'] ?? 0;
$totalEnrollments = $db->fetch("SELECT COUNT(*) as total FROM enrollments")['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
 body {
    background: #f1f5f9; /* nền xám xanh rất pro */
    font-family: 'Segoe UI', sans-serif;
}

/* CONTAINER */
.container {
    max-width: 1100px;
}

/* HEADER */
.header {
    background: #1e293b;
    color: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

/* STAT CARD */
.stat-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    transition: all 0.25s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

/* HOVER NHẢY NHẸ */
.stat-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

/* ICON MÀU NHẸ (không lòe) */
.stat-card i {
    font-size: 22px;
    margin-bottom: 10px;
    display: block;
    color: #3b82f6;
}

/* CARD BOX */
.card-box {
    border-radius: 15px;
    background: white;
    transition: all 0.25s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.card-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

/* MENU */
.menu a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px;
    border-radius: 10px;
    text-decoration: none;
    color: #334155;
    transition: all 0.2s ease;
}

/* HOVER MENU */
.menu a:hover {
    background: #e2e8f0;
    transform: translateX(6px);
}

/* FOOTER */
.footer {
    text-align: center;
    margin-top: 50px;
    color: #64748b;
}
    </style>
</head>

<body>

<div class="container mt-4">

    <!-- HEADER -->
    <div class="header mb-4">
        <h2><i class="bi bi-mortarboard-fill"></i> Student Management Dashboard</h2>
        <p class="mb-0">Manage students, courses and enrollments easily</p>
    </div>

    <!-- STATS -->
    <div class="row text-center mb-4 g-3">

        <div class="col-md-4">
            <div class="stat-card students">
                <i class="bi bi-people-fill"></i>
<h5>Students</h5>
                <h2><?= $totalStudents ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card courses">
                <h5><i class="bi bi-book-fill"></i> Courses</h5>
                <h2><?= $totalCourses ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card enrollments">
                <h5><i class="bi bi-pencil-square"></i> Enrollments</h5>
                <h2><?= $totalEnrollments ?></h2>
            </div>
        </div>

    </div>

    <!-- MAIN -->
    <div class="row g-3">

        <!-- MANAGEMENT -->
        <div class="col-md-6">
            <div class="card p-4 card-box">
                <h5><i class="bi bi-folder-fill"></i> Management</h5>

                <div class="menu mt-3">
                    <a href="students/index.php"><i class="bi bi-person"></i> Students</a>
                    <a href="course/index.php"><i class="bi bi-book"></i> Courses</a>
                    <a href="enrollments/index.php"><i class="bi bi-list-check"></i> Enrollments</a>
                </div>
            </div>
        </div>

        <!-- QUICK ACTION -->
        <div class="col-md-6">
            <div class="card p-4 card-box">
                <h5><i class="bi bi-lightning-fill"></i> Quick Actions</h5>

                <div class="menu mt-3">
                    <a href="students/create.php"><i class="bi bi-person-plus"></i> Add Student</a>
                    <a href="course/create.php"><i class="bi bi-plus-square"></i> Add Course</a>
                    <a href="enrollments/create.php"><i class="bi bi-journal-plus"></i> Add Enrollment</a>
                </div>
            </div>
        </div>

    </div>

    <!-- FOOTER -->
    <div class="footer">
        <hr>
        <p>✨ Designed by You | CRUD PHP Project</p>
    </div>

</div>

</body>
</html>