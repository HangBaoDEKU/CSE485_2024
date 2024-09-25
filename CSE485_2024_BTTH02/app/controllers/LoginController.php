<?php
require_once('./app/services/LoginService.php');

class LoginController {
    private $loginService;

    public function __construct() {
        $this->loginService = new LoginService();
    }

    public function index() {
        include("./app/views/member/login.php"); // Tải view đăng nhập
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($username) && !empty($password)) {
                $user = $this->loginService->authenticateUser($username, $password);
                if ($user) {
                    session_start();
                    $_SESSION['user'] = $user['username']; 

                    // Thông báo và điều hướng
                    echo "<script>alert('Đăng nhập thành công!'); window.location.href = 'index.php';</script>";
                } else {
                    echo "<script>alert('Sai tên người dùng hoặc mật khẩu!');window.location.href = 'index.php?controller=login&action=login';</script>";
                }
            } else {
                echo "<script>alert('Vui lòng nhập tên người dùng và mật khẩu!');window.location.href = 'index.php?controller=login&action=login';</script>";
            }
        } else {
            $this->index(); 
        }
    }
}
?>
