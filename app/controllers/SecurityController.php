<?php

class SecurityController {
    private $securityModel;

    public function __construct() {
        $this->securityModel = new SecurityModel();
    }

    public function showSecuritySettings() {
        $userId = $_SESSION['user_id'];
        $userSecuritySettings = $this->securityModel->getUserSecuritySettings($userId);
        include('app/views/security/settings.php');
    }

    public function changePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            if (empty($currentPassword) || empty($newPassword)) {
                echo "Both current and new passwords are required.";
                return;
            }
            $this->securityModel->changeUserPassword($userId, $currentPassword, $newPassword);
            echo "Your password has been changed!";
        } else {
            include('app/views/security/changePassword.php');
        }
    }
}

?>
