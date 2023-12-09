<?php

class FeedbackController {
    private $feedbackModel;

    public function __construct() {
        // Initialize the necessary model
        $this->feedbackModel = new FeedbackModel();
    }

    public function showFeedbackForm() {
        // Display the feedback form
        include('app/views/feedback/form.php');
    }

    public function submitFeedback() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $feedbackContent = $_POST['feedback_content'];
            if (empty($feedbackContent)) {
                echo "Feedback content is required.";
                return;
            }
            $this->feedbackModel->submitFeedback($userId, $feedbackContent);
            echo "Thank you for your feedback!";
        } else {
            echo "Invalid request method.";
        }
    }
}

?>
