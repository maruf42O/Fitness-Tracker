<?php

class UserStatsModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRecentWorkouts($userId, $limit = 5) {
        $query = "SELECT * FROM workout_logs WHERE user_id = ? ORDER BY date DESC LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $userId, $limit);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }

    // Add functions for retrieving and calculating other user statistics
}

?>
