<?php

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($username) || empty($email) || empty($password)) {
                echo "All fields are required.";
                return;
            }

            if ($this->userModel->isUsernameTaken($username)) {
                echo "Username is already taken. Please choose another.";
                return;
            }

            if ($this->userModel->isEmailTaken($email)) {
                echo "Email is already registered. Please use another email.";
                return;
            }
            $hashedPassword = md5($password);
            $userId = $this->userModel->registerUser($username, $email, $hashedPassword);
            header("Location: /user/profile/$userId");
            exit();
        } else {
            include('app/views/user/register.php');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email) || empty($password)) {
                echo "Both email and password are required.";
                return;
            }
            $user = $this->userModel->getUserByEmail($email);

            if ($user && md5($password) === $user['password']) {
                $_SESSION['user_id'] = $user['id'];

                header("Location: /dashboard");
                exit();
            } else {
                echo "Invalid email or password.";
                return;
            }
        } else {
            include('app/views/user/login.php');
        }
    }

    public function profile($userId) {
        $user = $this->userModel->getUserById($userId);

        if ($user) {
            include('app/views/user/profile.php');
        } else {
            echo "User not found.";
        }
    }

    public function editProfile($userId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        } else {
            include('app/views/user/editProfile.php');
        }
    }

    public function logout() {
    }
}

?>
