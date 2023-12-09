<?php

class VirtualCoachingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function scheduleVirtualSession($userId, $coachId, $dateTime, $duration) {
        $stmt = $this->db->prepare("INSERT INTO virtual_coaching_sessions (user_id, coach_id, session_datetime, session_duration) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $userId, $coachId, $dateTime, $duration);
        $stmt->execute();
        $stmt->close();
    }

    public function getUpcomingSessions($userId) {
        $stmt = $this->db->prepare("SELECT * FROM virtual_coaching_sessions WHERE user_id = ? AND session_datetime > NOW()");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $sessions = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $sessions;
    }

    public function getPastSessions($userId) {
        $stmt = $this->db->prepare("SELECT * FROM virtual_coaching_sessions WHERE user_id = ? AND session_datetime < NOW()");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $sessions = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $sessions;
    }

    public function rateCoach($sessionId, $rating, $feedback) {
        $stmt = $this->db->prepare("UPDATE virtual_coaching_sessions SET rating = ?, feedback = ? WHERE session_id = ?");
        $stmt->bind_param("isi", $rating, $feedback, $sessionId);
        $stmt->execute();
        $stmt->close();
    }
}

?>
