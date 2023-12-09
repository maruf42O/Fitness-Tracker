<?php

class WorkoutLogController {
    private $workoutLogModel;

    public function __construct() {
        $this->workoutLogModel = new WorkoutLogModel();
    }

    public function viewWorkoutLogs() {
        $userId = $_SESSION['user_id'];
        $userWorkoutLogs = $this->workoutLogModel->getUserWorkoutLogs($userId);
        include('app/views/workoutLog/all.php');
    }

    public function viewProgressCharts() {
        $userId = $_SESSION['user_id'];
        $userWorkoutLogs = $this->workoutLogModel->getUserWorkoutLogs($userId);
        include('app/views/workoutLog/progressCharts.php');
    }

    public function deleteWorkoutLog($logId) {
        $userId = $_SESSION['user_id'];
        if ($this->workoutLogModel->isUserOwnsLog($userId, $logId)) {
            $this->workoutLogModel->deleteWorkoutLog($logId);
            header("Location: /workoutLog/all");
            exit();
        } else {
            echo "Unauthorized access.";
        }
    }
}

?>
