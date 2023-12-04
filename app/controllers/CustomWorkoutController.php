<?php

class CustomWorkoutController {
    private $customWorkoutModel;

    public function __construct() {
        // Initialize the necessary model
        $this->customWorkoutModel = new CustomWorkoutModel();
    }

    public function viewAllCustomWorkouts() {
        // Handle displaying all custom workouts for the user
        // Example: Fetch custom workouts and display them
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $customWorkouts = $this->customWorkoutModel->getAllCustomWorkouts($userId);

        // Display the custom workouts
        include('app/views/customWorkout/all.php');
    }

    public function viewCustomWorkout($workoutId) {
        // Handle displaying details of a specific custom workout
        // Example: Fetch custom workout details and display them
        $customWorkout = $this->customWorkoutModel->getCustomWorkoutById($workoutId);

        // Display the custom workout details
        include('app/views/customWorkout/details.php');
    }

    public function createCustomWorkout() {
        // Handle creating a new custom workout
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process custom workout creation form submission
            // Example: Validate inputs and create the workout (you should handle this in CustomWorkoutModel)
            $userId = $_SESSION['user_id']; // Assuming you have a valid user session
            $workoutName = $_POST['workout_name'];
            $workoutDescription = $_POST['workout_description'];

            // Validate inputs (you should add more validation)
            if (empty($workoutName) || empty($workoutDescription)) {
                // Display an error message
                echo "Both workout name and description are required.";
                return;
            }

            // Create the custom workout (you should handle this in CustomWorkoutModel)
            $this->customWorkoutModel->createCustomWorkout($userId, $workoutName, $workoutDescription);

            // Redirect to the user's dashboard or created custom workout
            header("Location: /dashboard");
            exit();
        } else {
            // Display the custom workout creation form
            include('app/views/customWorkout/create.php');
        }
    }

    // Add other custom workout-related methods as needed
}

?>
