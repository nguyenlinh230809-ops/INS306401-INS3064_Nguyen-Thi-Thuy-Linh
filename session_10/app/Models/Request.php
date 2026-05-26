<?php
require_once 'Database.php';

class Request {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM tickets ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
}