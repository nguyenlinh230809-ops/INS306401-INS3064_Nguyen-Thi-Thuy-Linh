<?php
require_once 'Database.php';
$db = Database::getInstance()->getConnection();

// Lấy dữ liệu từ URL
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';

// SQL base
$sql = "
SELECT 
    p.id,
    p.name,
    p.price,
    p.stock,
    c.category_name
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
WHERE 1=1
";

$params = [];

// 🔍 Search (độc lập)
if ($search !== '') {
    $sql .= " AND p.name LIKE :search";
    $params[':search'] = "%" . $search . "%";
}

// 📂 Category (độc lập - QUAN TRỌNG)
if ($category !== '') {
    $sql .= " AND p.category_id = :category";
    $params[':category'] = $category;
}

// Sort
$sql .= " ORDER BY p.id DESC";

// Execute
$stmt = $db->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

// Lấy categories
$categories = $db->query("SELECT * FROM categories")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .low-stock {
            background-color: #ffe5e5 !important;
        }
    </style>
</head>
<body class="container mt-4">

<h2 class="mb-4">Product Admin Dashboard</h2>

<!-- 🔍 FILTER FORM -->
<form method="GET" class="row g-3 mb-4">

    <!-- Search -->
    <div class="col-md-4">
        <input 
            type="text" 
            name="search" 
            class="form-control" 
            placeholder="Search product..."
            value="<?= htmlspecialchars($search) ?>">
    </div>

    <!-- Category -->
    <div class="col-md-4">
        <select name="category" class="form-select">
            <option value="">All Categories</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"
                    <?= ($category == $cat['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Buttons -->
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="index.php" class="btn btn-secondary">Reset</a>
    </div>

</form>

<!-- 📊 TABLE -->
<table class="table table-bordered table-hover">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Category</th>
            <th>Stock</th>
        </tr>
    </thead>

    <tbody>

    <?php if (!empty($products)): ?>
        <?php foreach ($products as $row): ?>
            <tr class="<?= ($row['stock'] < 10) ? 'low-stock' : '' ?>">
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= number_format($row['price'], 2) ?></td>
                <td><?= $row['category_name'] ?? 'No Category' ?></td>
                <td>
                    <?= $row['stock'] ?>
                    <?php if ($row['stock'] < 10): ?>
                        <span class="badge bg-danger">Low</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No products found</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>

</body>
</html>