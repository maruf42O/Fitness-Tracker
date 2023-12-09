<?php

class NotificationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function sendPushNotification($userId, $message) {
        $query = "INSERT INTO notification_history (user_id, message, sent_at) VALUES (?, ?, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $userId, $message);
        $stmt->execute();
        $stmt->close();
    }
}

?>
