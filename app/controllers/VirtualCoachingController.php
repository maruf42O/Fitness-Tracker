<?php

class VirtualCoachingController {
    private $virtualCoachingModel;

    public function __construct() {
        $this->virtualCoachingModel = new VirtualCoachingModel();
    }

    public function showScheduleForm() {
        include('app/views/virtualCoaching/scheduleForm.php');
    }

    public function scheduleSession() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $coachId = $_POST['coach_id'];
            $dateTime = $_POST['session_datetime'];
            $duration = $_POST['session_duration'];

            if (empty($coachId) || empty($dateTime) || empty($duration)) {
                echo "Coach, date, and duration are required.";
                return;
            }
            $this->virtualCoachingModel->scheduleVirtualSession($userId, $coachId, $dateTime, $duration);
            echo "Your virtual coaching session has been scheduled!";
        } else {
            echo "Invalid request method.";
        }
    }

    public function showUpcomingSessions() {
        $userId = $_SESSION['user_id'];
        $upcomingSessions = $this->virtualCoachingModel->getUpcomingSessions($userId);
        include('app/views/virtualCoaching/upcomingSessions.php');
    }

    public function showPastSessions() {
        $userId = $_SESSION['user_id'];
        $pastSessions = $this->virtualCoachingModel->getPastSessions($userId);
        include('app/views/virtualCoaching/pastSessions.php');
    }

    public function rateCoach() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sessionId = $_POST['session_id'];
            $rating = $_POST['rating'];
            $feedback = $_POST['feedback'];


            if (empty($sessionId) || empty($rating) || empty($feedback)) {
                echo "Session ID, rating, and feedback are required.";
                return;
            }
            $this->virtualCoachingModel->rateCoach($sessionId, $rating, $feedback);
            echo "Thank you for providing feedback!";
        } else {
            echo "Invalid request method.";
        }
    }
}

?>
