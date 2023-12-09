<?php

class CustomWorkoutController {
    private $customWorkoutModel;

    public function __construct() {
        $this->customWorkoutModel = new CustomWorkoutModel();
    }

    public function viewAllCustomWorkouts() {
        $userId = $_SESSION['user_id'];
        $customWorkouts = $this->customWorkoutModel->getAllCustomWorkouts($userId);
        include('app/views/customWorkout/all.php');
    }

    public function viewCustomWorkout($workoutId) {
        $customWorkout = $this->customWorkoutModel->getCustomWorkoutById($workoutId);
        include('app/views/customWorkout/details.php');
    }

    public function createCustomWorkout() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $workoutName = $_POST['workout_name'];
            $workoutDescription = $_POST['workout_description'];
            if (empty($workoutName) || empty($workoutDescription)) {
                echo "Both workout name and description are required.";
                return;
            }
            $this->customWorkoutModel->createCustomWorkout($userId, $workoutName, $workoutDescription);
            header("Location: /dashboard");
            exit();
        } else {
            include('app/views/customWorkout/create.php');
        }
    }
}

?>
