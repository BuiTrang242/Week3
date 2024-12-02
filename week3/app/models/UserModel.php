<?php
// UserModel.php
// Model cho người dùng

require_once '../config/database.php';

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getUsers() {
      
        $query = 'SELECT * FROM user_data';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function saveUsers($users) {

    // Lưu danh sách người dùng
    $query = 'INSERT INTO user_data (username, password) VALUES (:username, :password)';
    $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'username' => $users['username'],
            'password' => $users['password']
        ]);
    
}
public function findUser($username) {
    $query = 'SELECT * FROM user_data WHERE username = :username';
    $stmt = $this->conn->prepare($query);
    $stmt->execute(['username' => $username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    public function createUser($username, $password) {
        $users = 
            ['username' => $username, 'password' => $password];
        

        if ($this->findUser($username)) {

            return false;
        }

      

        $this->saveUsers($users);


        return true;
    }
    public function verifyUser($username, $password) {
        $user = $this->findUser($username);
        
        if ($user && $user['password'] == $password) { 
            return $user;
        }
        return null;
    }
    
}
