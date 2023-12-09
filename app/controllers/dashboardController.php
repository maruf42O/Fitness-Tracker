<?php

class DashboardController {
    private $userModel;
    private $workoutLogModel;
    private $workoutPlanModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->workoutLogModel = new WorkoutLogModel();
        $this->workoutPlanModel = new WorkoutPlanModel();
    }

    public function index() {
        $userId = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($userId);
        $recentWorkoutLogs = $this->workoutLogModel->getRecentLogs($userId, 5);
        $workoutPlan = $this->workoutPlanModel->getUserWorkoutPlan($userId);
        include('app/views/dashboard.php');
    }

    public function viewWorkoutPlan() {
        $userId = $_SESSION['user_id'];
        $workoutPlan = $this->workoutPlanModel->getUserWorkoutPlan($userId);
        include('C:\xampp\htdocs\FitnessTracker\app\views\pages\workout_plans.html');
    }

}

?>
