<?php
// Hiển thị lỗi để dễ kiểm tra (Xóa dòng này khi đưa lên server thật)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'Database.php';

// Khởi tạo kết nối thông qua Singleton class
$db = Database::getInstance()->getConnection();

// 1. Chuẩn bị và thực thi câu truy vấn SQL (Lấy từ logic Part 2.3)
$sql = "SELECT u.name, u.email, SUM(o.total_amount) AS total_spent 
        FROM users u 
        JOIN orders o ON u.id = o.user_id 
        GROUP BY u.id, u.name, u.email 
        ORDER BY total_spent DESC 
        LIMIT 3";

$stmt = $db->prepare($sql);
$stmt->execute();

// 2. Lấy toàn bộ kết quả trả về dưới dạng mảng (Array)
$customers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Top 3 Customers</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin: 20px 0; font-family: Arial, sans-serif; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <h2>Danh sách 3 khách hàng chi tiêu nhiều nhất</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Total Spent</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($customers) > 0): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($customer['name']); ?></td>
                        <td><?php echo htmlspecialchars($customer['email']); ?></td>
                        <td>$<?php echo number_format($customer['total_spent'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Không tìm thấy dữ liệu khách hàng.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>