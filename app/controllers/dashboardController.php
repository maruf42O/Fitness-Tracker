<?php

class DashboardController {
    private $userModel;
    private $workoutLogModel;
    private $workoutPlanModel;

    public function __construct() {
        // Initialize the necessary models
        $this->userModel = new UserModel();
        $this->workoutLogModel = new WorkoutLogModel();
        $this->workoutPlanModel = new WorkoutPlanModel();
    }

    public function index() {
        // Handle dashboard logic
        // Example: Fetch user data, recent workout logs, and display the dashboard
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session

        // Fetch user data (you should handle this in UserModel)
        $user = $this->userModel->getUserById($userId);

        // Fetch recent workout logs (you should handle this in WorkoutLogModel)
        $recentWorkoutLogs = $this->workoutLogModel->getRecentLogs($userId, 5);

        // Fetch user's workout plan (you should handle this in WorkoutPlanModel)
        $workoutPlan = $this->workoutPlanModel->getUserWorkoutPlan($userId);

        // Display the dashboard
        include('app/views/dashboard.php');
    }

    public function viewWorkoutPlan() {
        // Handle viewing the user's workout plan
        // Example: Fetch user's workout plan and display it
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session

        // Fetch user's workout plan (you should handle this in WorkoutPlanModel)
        $workoutPlan = $this->workoutPlanModel->getUserWorkoutPlan($userId);

        // Display the workout plan
        include('app/views/workoutPlan/view.php');
    }

    // Add other dashboard-related methods as needed
}

?>
