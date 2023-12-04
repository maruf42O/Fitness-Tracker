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
        // Handle submitting user feedback
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process feedback form submission
            // Example: Validate inputs and submit feedback (you should handle this in FeedbackModel)
            $userId = $_SESSION['user_id']; // Assuming you have a valid user session
            $feedbackContent = $_POST['feedback_content'];

            // Validate inputs (you should add more validation)
            if (empty($feedbackContent)) {
                // Display an error message
                echo "Feedback content is required.";
                return;
            }

            // Submit the feedback (you should handle this in FeedbackModel)
            $this->feedbackModel->submitFeedback($userId, $feedbackContent);

            // Display a success message or redirect to the user's dashboard
            echo "Thank you for your feedback!";
        } else {
            // Redirect to the feedback form or display an error message
            echo "Invalid request method.";
        }
    }

    // Add other feedback-related methods as needed
}

?>
