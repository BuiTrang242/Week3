<?php
// HomeController.php
// Đây là controller chính cho ứng dụng

class HomeController extends Controller {
    public function index() {
      
        
        if(isset($_SESSION['username'])) {
            header('Location: http://week3.test/task');
            exit;
        }
        // Tải view home
        if(isset($_POST['login'])){ 
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Please fill in all fields';
                header('Location: http://week3.test/home');
                exit;
            }
            $userModel = $this->model('UserModel'); 
         

            $user = $userModel->verifyUser($username, $password);   
            if ($user) { 
                $_SESSION['user_id'] = $user['id']; 
                $_SESSION['username'] = $user['username'];
                header('Location: http://week3.test/task');
                exit;
            } else {
                $_SESSION['error'] = 'Invalid username or password';
                header('Location: http://week3.test/home');
                exit;
            }
        }
        $this->view('home');
        // require_once '../app/views/home.php';
        
    }
 
   
    function register() {
        if(isset($_POST['register'])){
           

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Please fill in all fields';
                header('Location: http://week3.test/home/register');
                exit;
            }
            $userModel = $this->model('UserModel');
            
            if ($userModel->createUser($username, $password)) { 
                $_SESSION['success'] = 'Registration successful! Please login.';
            

                header('Location: http://week3.test/home');
                exit;
            } else {
                $_SESSION['error'] = 'Username already exists';
                header('Location: http://week3.test/home/register');
                exit;
            }
        }
        $this->view('register');
    }
  
   
    function logout() {
        $_SESSION['username'] = null;
        header('Location: http://week3.test');
    }
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
    }
    

   

    

  



    

