<?php
// router.php
// Lớp xử lý định tuyến cho ứng dụng

class Router {
    private $controller = 'HomeController';
    private $method = 'index';
    private $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // Kiểm tra controller
        if (is_array($url) && file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Kiểm tra method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Lấy các tham số
        $this->params = $url ? array_values($url) : [];

        // Gọi method với các tham số
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        $url  = trim($_SERVER['REQUEST_URI'], '/');
       return explode('/', filter_var($url, FILTER_SANITIZE_URL));
    }
}
