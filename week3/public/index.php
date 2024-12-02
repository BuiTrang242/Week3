<?php
// index.php
// Điểm vào chính của ứng dụng

require_once '../core/controller.php';
require_once '../app/controllers/HomeController.php';
require_once '../core/router.php';
session_start();

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}

// Khởi tạo router
$router = new Router();

// $controller = new HomeController();
// $controller->index();

