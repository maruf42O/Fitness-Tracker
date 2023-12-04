<?php

class LiveWorkoutController {
    private $liveWorkoutModel;

    public function __construct() {
        // Initialize the necessary model
        $this->liveWorkoutModel = new LiveWorkoutModel();
    }

    public function showAllLiveWorkouts() {
        // Handle displaying all live workout sessions
        // Example: Fetch live workouts and display them
        $allLiveWorkouts = $this->liveWorkoutModel->getAllLiveWorkouts();

        // Display the live workout sessions
        include('app/views/liveWorkout/all.php');
    }

    public function showLiveWorkoutDetails($liveWorkoutId) {
        // Handle displaying details of a specific live workout
        // Example: Fetch live workout details and display them
        $liveWorkout = $this->liveWorkoutModel->getLiveWorkoutById($liveWorkoutId);

        // Display the live workout details
        include('app/views/liveWorkout/details.php');
    }

    public function joinLiveWorkout($liveWorkoutId) {
        // Handle joining a live workout session
        // Example: Validate user's eligibility and join the live workout (you should handle this in LiveWorkoutModel)
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session

        // Check if the user is eligible to join the live workout
        if ($this->liveWorkoutModel->isUserEligible($userId, $liveWorkoutId)) {
            // Join the live workout (you should handle this in LiveWorkoutModel)
            $this->liveWorkoutModel->joinLiveWorkout($userId, $liveWorkoutId);

            // Redirect to the live workout session or dashboard
            header("Location: /liveWorkout/details/$liveWorkoutId");
            exit();
        } else {
            // Display an error message or redirect to a 403 page
            echo "You are not eligible to join this live workout.";
        }
    }

    // Add other live workout-related methods as needed
}

?>
