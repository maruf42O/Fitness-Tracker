<?php

class NotificationController {
    private $notificationModel;

    public function __construct() {
        // Initialize the necessary model
        $this->notificationModel = new NotificationModel();
    }

    public function showNotifications() {
        // Handle displaying user notifications
        // Example: Fetch notifications and display them
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $userNotifications = $this->notificationModel->getUserNotifications($userId);

        // Display the user's notifications
        include('app/views/notification/all.php');
    }

    public function markAsRead($notificationId) {
        // Handle marking a notification as read
        // Example: Validate user's ownership and mark the notification as read (you should handle this in NotificationModel)
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session

        // Check if the user owns the notification
        if ($this->notificationModel->isUserOwnsNotification($userId, $notificationId)) {
            // Mark the notification as read
            $this->notificationModel->markNotificationAsRead($notificationId);

            // Redirect to the user's notifications or dashboard
            header("Location: /notifications");
            exit();
        } else {
            // Display an error message or redirect to a 403 page
            echo "Unauthorized access.";
        }
    }

    // Add other notification-related methods as needed
}

?>
