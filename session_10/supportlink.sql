CREATE DATABASE IF NOT EXISTS supportlink_db;
USE supportlink_db;

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    priority ENUM('Thấp', 'Trung bình', 'Cao') DEFAULT 'Trung bình',
    status ENUM('Mới', 'Đang xử lý', 'Hoàn thành') DEFAULT 'Mới',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tickets (title, description, priority) VALUES 
('Lỗi kết nối Wifi tầng 2', 'Tín hiệu rất yếu, thường xuyên bị ngắt.', 'Cao'),
('Yêu cầu cấp chuột mới', 'Chuột cũ bị hỏng nút cuộn.', 'Thấp');