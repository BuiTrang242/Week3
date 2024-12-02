<?php

class TaskController  extends Controller {

    function index() {
       
        if(!isset($_SESSION['username'])) {
            header('Location: http://week3.test/home');
            exit;
        }
            $this->view('tasks');
       
    }


    function add() {
    
    

        $taskModel = $this->model('TaskModel');
        $task = [
            "user_id" => $_SESSION['user_id'],
            "title" => $_POST['title'],
            "content" => $_POST['content'],
            "status" => $_POST['status']
        ];
        $taskModel->create($task);
        echo json_encode([
            'status' => true,
            'message' => 'Them thanh cong'
        ]);
    }
    function viewTask() {
        $keyword = $_POST['keyword'];
        $taskModel = $this->model('TaskModel');
        $tasks = $taskModel->search($keyword);
        $html = '';
        foreach($tasks as $task) {
            $html .= '<tr style="text-decoration: '. ($task['status']? 'line-through' : '').'">';
            $html .= '<td>' . $task['id'] . '</td>';
            $html .= '<td>' . $task['title'] . '</td>';
            $html .= '<td>' . $task['content'] . '</td>';
            $html .= '<td>' . ($task['status']? 'Hoàn Thành' : 'Chưa Hoàn Thành') . '</td>';
            $html .= '<td><button type="button" onclick="editTask(' . $task['id'] . ')" class="btn btn-primary btn-warning">Sửa</button> <button type="button" onclick="deleteTask(' . $task['id'] . ')" class="btn btn-danger delete-btn">Xóa</button></td>';
            $html .= '</tr>';
        }
        echo $html;
    }
    public function delete($id) {
        $taskModel = $this->model('TaskModel');
        $taskModel->delete($id);
        echo json_encode([
            'status' => true,
            'message' => 'Xoa thanh cong'
        ]);
    }
    public function edit($id) {
        $taskModel = $this->model('TaskModel');
        $task = $taskModel->find($id);
        echo json_encode($task);
        
    }
    public function update() {
        $taskModel = $this->model('TaskModel');
        $task = [
            "id" => $_POST['id'],
            "title" => $_POST['title'],
            "content" => $_POST['content'],
            "status" => $_POST['status']
        ];
        
        $taskModel->update($task);
        echo json_encode([
            'status' => true,
            'message' => 'Cap nhat thanh cong'
        ]);

    }

}