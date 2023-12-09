<?php

require_once 'C:\xampp\htdocs\FitnessTracker\app\models\WorkoutPlanModel.php';
require_once 'C:\xampp\htdocs\FitnessTracker\app\config\Database.php';

class WorkoutPlanController {
    private $workoutPlanModel;

    public function __construct() {
        $database = new Database();
        $this->workoutPlanModel = new WorkoutPlanModel($database->getConnection());
    }

    
    public function showAll() {
        $allWorkoutPlans = $this->workoutPlanModel->getAllWorkoutPlans();
        include('C:\xampp\htdocs\FitnessTracker\app\views\pages\workout_plans.html');
    }

    public function showDetails($planId) {
        $workoutPlan = $this->workoutPlanModel->getWorkoutPlanById($planId);
        include('app/views/workoutPlan/details.php');
    }

    public function createCustom() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $planName = $_POST['plan_name'];
            $planDescription = $_POST['plan_description'];
            $planData = $_POST['plan_difficulty'];
            if (empty($planName) || empty($planDescription) || empty($planData)) {
                echo "plan name, description, and data are required.";
                return;
            }
            $this->workoutPlanModel->createWorkoutPlan($planName, $planDescription, $planData);
            header("Location: /dashboard");
            exit();
        } else {
            include('app/views/workoutPlan/createCustom.php');
        }
    }

    public function getAllWorkoutPlans() {
        $query = "SELECT * FROM workout_plans";
        $result = $this->db->query($query);

        if (!$result) {
            die("Error retrieving workout plans: " . $this->db->error);
        }

        $workoutPlans = [];

        while ($row = $result->fetch_assoc()) {
            $workoutPlans[] = $row;
        }

        return $workoutPlans;
    }
}
?>
