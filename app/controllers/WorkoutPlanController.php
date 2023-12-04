<?php

class WorkoutPlanController {
    private $workoutPlanModel;

    public function __construct() {
        // Initialize the necessary model
        $this->workoutPlanModel = new WorkoutPlanModel();
    }

    public function showAll() {
        // Handle displaying all available workout plans
        // Example: Fetch workout plans and display them
        $allWorkoutPlans = $this->workoutPlanModel->getAllWorkoutPlans();

        // Display the workout plans
        include('app/views/workoutPlan/all.php');
    }

    public function showDetails($planId) {
        // Handle displaying details of a specific workout plan
        // Example: Fetch workout plan details and display them
        $workoutPlan = $this->workoutPlanModel->getWorkoutPlanById($planId);

        // Display the workout plan details
        include('app/views/workoutPlan/details.php');
    }

    public function createCustom() {
        // Handle creating a custom workout plan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process custom workout plan creation form submission
            // Example: Validate inputs and create the plan (you should handle this in WorkoutPlanModel)
            $userId = $_SESSION['user_id']; // Assuming you have a valid user session
            $planName = $_POST['plan_name'];
            $planDescription = $_POST['plan_description'];

            // Validate inputs (you should add more validation)
            if (empty($planName) || empty($planDescription)) {
                // Display an error message
                echo "Both plan name and description are required.";
                return;
            }

            // Create the custom workout plan (you should handle this in WorkoutPlanModel)
            $this->workoutPlanModel->createCustomWorkoutPlan($userId, $planName, $planDescription);

            // Redirect to the user's dashboard or created workout plan
            header("Location: /dashboard");
            exit();
        } else {
            // Display the custom workout plan creation form
            include('app/views/workoutPlan/createCustom.php');
        }
    }

    // Add other workout plan-related methods as needed
}

?>
