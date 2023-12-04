<?php

class MessageController {
    private $messageModel;

    public function __construct() {
        // Initialize the necessary model
        $this->messageModel = new MessageModel();
    }

    public function showMessages() {
        // Handle displaying the user's messages
        // Example: Fetch messages and display them
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $userMessages = $this->messageModel->getUserMessages($userId);

        // Display the user's messages
        include('app/views/message/all.php');
    }

    public function sendMessage($recipientId) {
        // Handle sending a message to another user
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process message sending form submission
            // Example: Validate inputs and send the message (you should handle this in MessageModel)
            $userId = $_SESSION['user_id']; // Assuming you have a valid user session
            $messageContent = $_POST['message_content'];

            // Validate inputs (you should add more validation)
            if (empty($messageContent)) {
                // Display an error message
                echo "Message content is required.";
                return;
            }

            // Send the message (you should handle this in MessageModel)
            $this->messageModel->sendMessage($userId, $recipientId, $messageContent);

            // Redirect to the user's messages or message thread
            header("Location: /messages");
            exit();
        } else {
            // Display the message sending form
            include('app/views/message/sendForm.php');
        }
    }

    public function showMessageThread($otherUserId) {
        // Handle displaying a message thread between the user and another user
        // Example: Fetch messages and display them
        $userId = $_SESSION['user_id']; // Assuming you have a valid user session
        $messages = $this->messageModel->getMessageThread($userId, $otherUserId);

        // Display the message thread
        include('app/views/message/thread.php');
    }

    // Add other message-related methods as needed
}

?>
