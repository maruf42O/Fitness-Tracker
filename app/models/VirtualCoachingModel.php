<?php

class VirtualCoachingModel {
    private $db;

    public function __construct($db) {
        // Initialize the database connection
        $this->db = $db;
    }

    public function scheduleVirtualSession($userId, $coachId, $dateTime, $duration) {
        // Logic to schedule a virtual coaching session
        // Example: Insert a new session record into the database
        $stmt = $this->db->prepare("INSERT INTO virtual_coaching_sessions (user_id, coach_id, session_datetime, session_duration) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $userId, $coachId, $dateTime, $duration);
        $stmt->execute();
        $stmt->close();

        // You might also want to send confirmation emails, update user and coach records, etc.
    }

    public function getUpcomingSessions($userId) {
        // Logic to fetch upcoming virtual coaching sessions for a user
        // Example: Query the database for upcoming sessions
        $stmt = $this->db->prepare("SELECT * FROM virtual_coaching_sessions WHERE user_id = ? AND session_datetime > NOW()");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $sessions = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $sessions;
    }

    public function getPastSessions($userId) {
        // Logic to fetch past virtual coaching sessions for a user
        // Example: Query the database for past sessions
        $stmt = $this->db->prepare("SELECT * FROM virtual_coaching_sessions WHERE user_id = ? AND session_datetime < NOW()");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $sessions = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $sessions;
    }

    public function rateCoach($sessionId, $rating, $feedback) {
        // Logic to rate a coach after a virtual coaching session
        // Example: Update the session record in the database with rating and feedback
        $stmt = $this->db->prepare("UPDATE virtual_coaching_sessions SET rating = ?, feedback = ? WHERE session_id = ?");
        $stmt->bind_param("isi", $rating, $feedback, $sessionId);
        $stmt->execute();
        $stmt->close();

        // You might also want to update coach records, calculate overall ratings, etc.
    }

    // Add other virtual coaching-related methods as needed
}

?>
