<?php
// controller.php
// Lớp cơ bản cho các controller

class Controller {
    public function model($model) {
        // Tải model
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        // Tải view
        require_once '../app/views/' . $view . '.php';
        exit();
    }


    
}
