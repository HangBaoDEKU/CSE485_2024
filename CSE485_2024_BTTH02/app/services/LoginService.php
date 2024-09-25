<?php
require_once './app/models/LoginModel.php';

class LoginService {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function authenticate($username, $password) {
        $user = $this->loginModel->getUserByUsername($username);
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return true;
            } else {
                return 'Sai mật khẩu!';
            }
        } else {
            return 'Không tìm thấy người dùng!';
        }
    }
}

