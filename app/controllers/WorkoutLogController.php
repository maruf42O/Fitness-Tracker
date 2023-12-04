<?php

class WorkoutLogController {
    private $workoutLogModel;

    public function __construct() {
        // Initialize the necessary model
        $this->workoutLogModel = new WorkoutLogModel();
    }

    public function viewWorkoutLogs() {
        // Handle displaying all workout logs for the user
        // Example: Fetch workout logs and display them
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $userWorkoutLogs = $this->workoutLogModel->getUserWorkoutLogs($userId);

        // Display the workout logs
        include('app/views/workoutLog/all.php');
    }

    public function viewProgressCharts() {
        // Handle displaying progress charts based on workout logs
        // Example: Fetch workout logs and generate charts
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $userWorkoutLogs = $this->workoutLogModel->getUserWorkoutLogs($userId);

        // Generate progress charts
        // You may use a chart library (e.g., Chart.js) to display charts

        // Display the progress charts
        include('app/views/workoutLog/progressCharts.php');
    }

    public function deleteWorkoutLog($logId) {
        // Handle deleting a workout log
        // Example: Validate user's ownership and delete the log (you should handle this in WorkoutLogModel)
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session

        // Check if the user owns the workout log
        if ($this->workoutLogModel->isUserOwnsLog($userId, $logId)) {
            // Delete the workout log
            $this->workoutLogModel->deleteWorkoutLog($logId);

            // Redirect to the user's workout logs or dashboard
            header("Location: /workoutLog/all");
            exit();
        } else {
            // Display an error message or redirect to a 403 page
            echo "Unauthorized access.";
        }
    }

    // Add other workout log-related methods as needed
}

?>
