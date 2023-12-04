<?php

class SecurityController {
    private $securityModel;

    public function __construct() {
        // Initialize the necessary model
        $this->securityModel = new SecurityModel();
    }

    public function showSecuritySettings() {
        // Handle displaying user security settings
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $userSecuritySettings = $this->securityModel->getUserSecuritySettings($userId);

        // Display the user's security settings
        include('app/views/security/settings.php');
    }

    public function changePassword() {
        // Handle changing user password
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process password change form submission
            // Example: Validate inputs and change password (you should handle this in SecurityModel)
            $userId = $_SESSION['user_id']; // Assuming you have a valid user session
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];

            // Validate inputs (you should add more validation)
            if (empty($currentPassword) || empty($newPassword)) {
                // Display an error message
                echo "Both current and new passwords are required.";
                return;
            }

            // Change the password (you should handle this in SecurityModel)
            $this->securityModel->changeUserPassword($userId, $currentPassword, $newPassword);

            // Display a success message or redirect to the user's dashboard
            echo "Your password has been changed!";
        } else {
            // Display the password change form
            include('app/views/security/changePassword.php');
        }
    }

    // Add other security-related methods as needed
}

?>
