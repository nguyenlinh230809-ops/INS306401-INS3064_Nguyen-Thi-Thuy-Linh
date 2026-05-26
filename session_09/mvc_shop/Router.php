<?php
class Router {
    public function handle() {
        $url = isset($_GET['url']) ? $_GET['url'] : 'product/index';
        $parts = explode('/', $url);
        
        $controllerName = ucfirst($parts[0]) . 'Controller';
        $action = isset($parts[1]) ? $parts[1] : 'index';

        if (file_exists($controllerName . '.php')) {
            require_once $controllerName . '.php';
            $controller = new $controllerName();
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else { echo "404 - Action không tồn tại"; }
        } else { echo "404 - Controller không tồn tại"; }
    }
}