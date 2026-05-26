<?php
require_once '../app/Models/Request.php';

class RequestController {
    public function index() {
        $model = new Request();
        $tickets = $model->getAll();
        require_once '../views/requests/index.php';
    }
}