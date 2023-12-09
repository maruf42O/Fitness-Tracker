<?php

class LiveWorkoutController {
    private $liveWorkoutModel;

    public function __construct() {
        $this->liveWorkoutModel = new LiveWorkoutModel();
    }

    public function showAllLiveWorkouts() {
        $allLiveWorkouts = $this->liveWorkoutModel->getAllLiveWorkouts();
        include('app/views/liveWorkout/all.php');
    }

    public function showLiveWorkoutDetails($liveWorkoutId) {
        $liveWorkout = $this->liveWorkoutModel->getLiveWorkoutById($liveWorkoutId);
        include('app/views/liveWorkout/details.php');
    }

    public function joinLiveWorkout($liveWorkoutId) {
        $userId = $_SESSION['user_id'];
        if ($this->liveWorkoutModel->isUserEligible($userId, $liveWorkoutId)) {
            $this->liveWorkoutModel->joinLiveWorkout($userId, $liveWorkoutId);
            header("Location: /liveWorkout/details/$liveWorkoutId");
            exit();
        } else {
            echo "You are not eligible to join this live workout.";
        }
    }
}

?>
