<?php

class WorkoutPlanModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function createWorkoutPlan($planData) {
        // Assume $planData is an associative array with plan details
        $query = "INSERT INTO workout_plans (title, description, difficulty) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $planData['title'], $planData['description'], $planData['difficulty']);
        $stmt->execute();
        $stmt->close();
    }

    public function getWorkoutPlanById($planId) {
        $query = "SELECT * FROM workout_plans WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $planId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    // Add functions for updating and deleting workout plans as needed
}

?>
