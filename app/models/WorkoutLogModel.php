<?php

class WorkoutLogModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function logWorkout($userId, $workoutId, $sets, $reps, $weights) {
        $query = "INSERT INTO workout_logs (user_id, workout_id, sets, reps, weights, date) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iiiii", $userId, $workoutId, $sets, $reps, $weights);
        $stmt->execute();
        $stmt->close();
    }
}

?>
