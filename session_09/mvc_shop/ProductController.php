<?php
// Bắt buộc phải require file Controller cha và Model Product
require_once 'Controller.php';
require_once 'Product.php';

class ProductController extends Controller {
    
    // Hàm hiển thị danh sách sản phẩm
    public function index() {
        $productModel = new Product();
        $list = $productModel->getAll();
        
        // Gọi hàm render từ class Controller cha
        // Truyền mảng dữ liệu vào trang main.php
        $this->render('main', ['products' => $list]);
    }

    // Hàm hiển thị trang thêm mới và xử lý lưu dữ liệu
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $desc = $_POST['description'] ?? '';

            $productModel = new Product();
            $result = $productModel->create($name, $price, $desc);

            if ($result) {
                // Sau khi thêm thành công, quay về trang danh sách
                header("Location: index.php?url=product/index");
                exit();
            } else {
                echo "Có lỗi xảy ra khi thêm sản phẩm!";
            }
        } else {
            // Nếu là truy cập bình thường (GET), hiện form thêm
            $this->render('create');
        }
    }
}