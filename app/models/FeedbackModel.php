<?php

class FeedbackModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitFeedback($userId, $feedback) {
        $query = "INSERT INTO user_feedback (user_id, feedback) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $userId, $feedback);
        $stmt->execute();
        $stmt->close();
    }
}

?>
