<?php
require_once './app/services/LoginService.php';

class LoginController {
    private $loginService;

    public function __construct() {
        $this->loginService = new LoginService();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = md5($password); //Mã hóa password 

            $result = $this->loginService->authenticate($username, $password);

            if ($result === true) {
                echo "<script>alert('Đăng nhập thành công!');</script>";
            } else {
                echo "<script>alert('$result');</script>";
            }
        }
        
        // Render view
        require_once './app/views/member/login.php';
    }
}
