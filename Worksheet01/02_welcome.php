<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INS3064 Trang chào mừng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 600px;
            text-align: center;
        }
        h1 {
            color: #667eea;
            margin-bottom: 20px;
        }
        .info {
            background: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .info p {
            margin: 10px 0;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Thêm dòng kẻ cho đẹp */
            padding-bottom: 5px;
        }
        .label {
            font-weight: bold;
            color: #667eea;
            width: 120px; /* Căn chỉnh cột */
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to INS3064</h1>
        
        <?php
            // --- KHAI BÁO BIẾN THÔNG TIN SINH VIÊN ---
            $name = "Nguyễn Thị Thùy Linh"; 
            $studentId = "23070606";        
            $class = "INS3064 01";          
            $email = "23070606@vnu.edu.vn"; 

            // Thiết lập múi giờ Việt Nam để hiển thị giờ đúng
            date_default_timezone_set('Asia/Ho_Chi_Minh');
        ?>

        <div class="info">
            <p><span class="label">Name:</span> <?php echo $name; ?></p>
            <p><span class="label">Student ID:</span> <?php echo $studentId; ?></p>
            <p><span class="label">Class:</span> <?php echo $class; ?></p>
            <p><span class="label">Email:</span> <?php echo $email; ?></p>
            
            <p><span class="label">Date:</span> 
                <?php 
                    // Hiển thị ngày tháng theo định dạng yêu cầu: Thứ, ngày tháng năm
                    echo date("l, F j, Y"); 
                ?>
            </p>
            
            <p><span class="label">Time:</span> 
                <?php 
                    // Hiển thị giờ theo định dạng HH:MM:SS
                    echo date("H:i:s"); 
                ?>
            </p>
        </div>

    </div>
</body>
</html>