<?php

class UserController {
    private $userModel;

    public function __construct() {
        // Initialize the UserModel
        $this->userModel = new UserModel();
    }

    public function register() {
        // Handle user registration logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process registration form submission
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate inputs (you should add more validation)
            if (empty($username) || empty($email) || empty($password)) {
                // Display an error message
                echo "All fields are required.";
                return;
            }

            // Check if the username or email is already taken (you should implement this in UserModel)
            if ($this->userModel->isUsernameTaken($username)) {
                // Display an error message
                echo "Username is already taken. Please choose another.";
                return;
            }

            if ($this->userModel->isEmailTaken($email)) {
                // Display an error message
                echo "Email is already registered. Please use another email.";
                return;
            }

            // Hash the password (you should use password_hash() in a real-world scenario)
            $hashedPassword = md5($password);

            // Create a new user (you should handle this in UserModel)
            $userId = $this->userModel->registerUser($username, $email, $hashedPassword);

            // Redirect to the user's profile page
            header("Location: /user/profile/$userId");
            exit();
        } else {
            // Display the registration form
            include('app/views/user/register.php');
        }
    }

    public function login() {
        // Handle user login logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process login form submission
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate inputs (you should add more validation)
            if (empty($email) || empty($password)) {
                // Display an error message
                echo "Both email and password are required.";
                return;
            }

            // Verify login credentials (you should use password_verify() in a real-world scenario)
            $user = $this->userModel->getUserByEmail($email);

            if ($user && md5($password) === $user['password']) {
                // Set user session (you should use a proper authentication mechanism)
                $_SESSION['user_id'] = $user['id'];

                // Redirect to the user's dashboard or profile page
                header("Location: /dashboard");
                exit();
            } else {
                // Display an error message
                echo "Invalid email or password.";
                return;
            }
        } else {
            // Display the login form
            include('app/views/user/login.php');
        }
    }

    public function profile($userId) {
        // Handle user profile logic
        $user = $this->userModel->getUserById($userId);

        if ($user) {
            // Display the user profile
            include('app/views/user/profile.php');
        } else {
            // Display an error message or redirect to a 404 page
            echo "User not found.";
        }
    }

    public function editProfile($userId) {
        // Handle user profile editing logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process profile edit form submission
            // Update user data in the database (you should handle this in UserModel)
            // Redirect to the user's profile page after updating
        } else {
            // Display the profile edit form
            include('app/views/user/editProfile.php');
        }
    }

    public function logout() {
        // Handle user logout logic
        // Destroy the session and redirect to the home page or login page
    }

    // Add other user-related methods as needed
}

?>
