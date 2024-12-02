<?php
// TaskModel.php
// Model cho tasks

require_once '../config/database.php';

class TaskModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
    // hàm thêm sửa xóa mà có dung cơ sở dữ liệu thì viết ở đây
    public function create($task) {
        $query = 'INSERT INTO tasks (user_id, title, content,status) VALUES (:user_id, :title, :content, :status)';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'user_id' => $task['user_id'],
            'title' => $task['title'],
            'content' => $task['content'],
            'status' => $task['status']
        ]);
    }
    public function getTasks() {
        $query = 'SELECT * FROM tasks WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'user_id' => $_SESSION['user_id']
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id) {
        $query = 'DELETE FROM tasks WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
    }
    public function find($id) {
        $query =  "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        return $task;
    }
    public function update($task) {
        $query = "UPDATE tasks SET title = :title, content = :content, status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'id' => $task['id'],
            'title' => $task['title'],
            'content' => $task['content'],
            'status' => $task['status']
        ]);
     
       
    }
    public function search($keyword) {
        $query = "SELECT * FROM tasks WHERE title LIKE :keyword OR content LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'keyword' => "%$keyword%"
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
