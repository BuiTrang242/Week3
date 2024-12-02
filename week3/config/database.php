<?php
// database.php
// Kết nối đến cơ sở dữ liệu

class Database {
    private $host = 'localhost';
    private $db_name = 'users';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Lỗi kết nối: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
