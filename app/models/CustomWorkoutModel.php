<?php

class CustomWorkoutModel {
    private $db; 

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function createCustomWorkout($userId, $workoutDetails) {
        $query = "INSERT INTO custom_workouts (user_id, title, description) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $userId, $workoutDetails['title'], $workoutDetails['description']);
        $stmt->execute();
        $stmt->close();
    }
}

?>
