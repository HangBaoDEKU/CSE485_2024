<!-- Vũ Hoài Liên -->

<?php
require_once('./app/services/SignupService.php');

class SignupController {
    private $signupService;

    public function __construct() {
        $this->signupService = new SignupService();
    }

    public function index() {
        include("./app/views/member/signup.php"); // Load the signup view
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($username) && !empty($password)) {
                // Validate username and password
                if ($this->validateUsername($username) && $this->validatePassword($password)) {
                    $registrationResult = $this->signupService->register($username, $password);
                    if ($registrationResult) {
                        echo "<script>alert('Đăng ký thành công. Bạn có thể đăng nhập ngay.'); window.location.href='index.php?controller=login&action=login';</script>";
                    } else {
                        echo "<script>alert('Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.'); window.location.href='index.php?controller=signup&action=index';</script>";
                    }
                } else {
                    if (!$this->validateUsername($username)) {
                        echo "<script>alert('Tên đăng nhập phải từ 3 ký tự trở lên và chỉ chứa chữ cái và số.'); window.location.href='index.php?controller=signup&action=index';</script>";
                    } elseif (!$this->validatePassword($password)) {
                        echo "<script>alert('Mật khẩu phải có ít nhất 6 ký tự.'); window.location.href='index.php?controller=signup&action=index';</script>";
                    }
                }
            } else {
                echo "<script>alert('Vui lòng nhập tên người dùng và mật khẩu!'); window.location.href='index.php?controller=signup&action=index';</script>";
            }
        } else {
            $this->index(); 
        }
    }

    private function validateUsername($username) {
        return preg_match('/^[a-zA-Z0-9]{3,}$/', $username);
    }

    private function validatePassword($password) {
        return strlen($password) >= 6;
    }
}
?>
