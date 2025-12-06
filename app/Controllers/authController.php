<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
        session_start();
    }
    
    public function login() {
        $data = [
            'email' => '',
            'emailError' => '',
            'passwordError' => ''
        ];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Validate
            if (empty($email)) {
                $data['emailError'] = "Email is required";
            }
            
            if (empty($password)) {
                $data['passwordError'] = "Password is required";
            }
            
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $user = $this->userModel->findByEmail($email);
                
                if ($user) {
                    if ($this->userModel->validateCredentials($password, $user['password'])) {
                        // Set session
                        $_SESSION['user_id'] = $user['Email'];
                        $_SESSION['user_type'] = $user['Account_type'];
                        
                        // Redirect
                        $redirect = $this->userModel->getRedirectPath($user['Account_type']);
                        header("Location: /{$redirect}");
                        exit();
                    } else {
                        $data['passwordError'] = "Incorrect password";
                    }
                } else {
                    $data['emailError'] = "Email is not registered";
                }
            }
            
            $data['email'] = $email; 
        }
        
        $this->view('auth/login', $data);
    }
    
    public function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }
    
    private function view($view, $data = []) {
        extract($data);
        require __DIR__ . "/../Views/{$view}.php";
    }
}
?>