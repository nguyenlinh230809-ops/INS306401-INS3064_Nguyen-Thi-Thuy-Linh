<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Cấu hình kết nối đến database ecommerce_db
        $dsn = "mysql:host=localhost;dbname=ecommerce_db;charset=utf8mb4";
        $username = "root"; 
        $password = "";     

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            // Khởi tạo kết nối PDO thực tế
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
