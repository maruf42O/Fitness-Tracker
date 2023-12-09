<?php
require_once 'C:\xampp\htdocs\FitnessTracker\app\models\WorkoutPlanModel.php';
require_once 'C:\xampp\htdocs\FitnessTracker\app\config\Database.php';
class WorkoutPlanModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function createWorkoutPlan($planName, $planDescription, $planData) {
        $query = "INSERT INTO workout_plans (title, description, difficulty) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $planName['title'], $planData['description'], $planData['difficulty']);
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
}

?>
