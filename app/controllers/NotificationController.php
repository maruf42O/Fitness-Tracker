<?php

class NotificationController {
    private $notificationModel;

    public function __construct() {
        $this->notificationModel = new NotificationModel();
    }

    public function showNotifications() {
        $userId = $_SESSION['user_id'];
        $userNotifications = $this->notificationModel->getUserNotifications($userId);

        include('app/views/notification/all.php');
    }

    public function markAsRead($notificationId) {
        $userId = $_SESSION['user_id'];

        if ($this->notificationModel->isUserOwnsNotification($userId, $notificationId)) {
            $this->notificationModel->markNotificationAsRead($notificationId);
            header("Location: /notifications");
            exit();
        } else {
            echo "Unauthorized access.";
        }
    }
}

?>
