<?php
class Controller {
    /**
     * Hàm dùng để load file giao diện và truyền dữ liệu vào
     * @param string $view Tên file view (không cần đuôi .php)
     * @param array $data Mảng dữ liệu muốn hiển thị ở view
     */
    public function render($view, $data = []) {
        // Giải nén mảng data thành các biến riêng lẻ để dùng trong view
        // Ví dụ: ['products' => $list] sẽ thành biến $products
        extract($data);
        
        $viewFile = $view . '.php';
        
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            die("Lỗi: Không tìm thấy file giao diện $viewFile");
        }
    }
}