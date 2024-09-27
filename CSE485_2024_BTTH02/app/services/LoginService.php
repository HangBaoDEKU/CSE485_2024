<?php
require_once('./app/models/LoginModel.php');

class LoginService {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function authenticateUser($username, $password) {
        $user = $this->loginModel->getUserByUsername($username);
        if ($user && md5($password) === $user['password']) {
            return $user; 
        }
        return null; 
    }
}
?>
