<?php
require_once 'Model.php';

class Product extends Model {
    public function getAll() {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $price, $description) {
        $sql = "INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $price, $description]);
    }
}