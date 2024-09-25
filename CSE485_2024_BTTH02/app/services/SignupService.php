<?php
require_once('./app/models/SignupModel.php');

class SignupService {
    private $signupModel;

    public function __construct() {
        $this->signupModel = new SignupModel();
    }

    public function register($username, $password) {
        if ($this->validateUsername($username) && $this->validatePassword($password)) {
            $existingUser = $this->signupModel->getUserByUsername($username);
            if (!$existingUser) {
                $hashedPassword = md5($password);
                return $this->signupModel->registerUser($username, $hashedPassword);
            }
            return false; // Username already exists
        }
        return false; // Validation failed
    }

    private function validateUsername($username) {
        // Username must be at least 3 characters and contain only alphanumeric characters
        return preg_match('/^[a-zA-Z0-9]{3,}$/', $username);
    }

    private function validatePassword($password) {
        // Password must be at least 6 characters
        return strlen($password) >= 6;
    }
}
?>
