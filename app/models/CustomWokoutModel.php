<?php

class CustomWorkoutModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function createCustomWorkout($userId, $workoutDetails) {
        // Assuming custom workouts are stored in a table named 'custom_workouts'
        $query = "INSERT INTO custom_workouts (user_id, title, description) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $userId, $workoutDetails['title'], $workoutDetails['description']);
        $stmt->execute();
        $stmt->close();
    }

    // Add functions for retrieving custom workouts, updating, and deleting them.
}

?>
