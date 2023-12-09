<?php

class MessageController {
    private $messageModel;

    public function __construct() {
        $this->messageModel = new MessageModel();
    }

    public function showMessages() {
        $userId = $_SESSION['user_id'];
        $userMessages = $this->messageModel->getUserMessages($userId);
        include('');
    }

    public function sendMessage($recipientId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $messageContent = $_POST['message_content'];

            if (empty($messageContent)) {
                echo "Message content is required.";
                return;
            }

            $this->messageModel->sendMessage($userId, $recipientId, $messageContent);
            header("Location: /messages");
            exit();
        } else {
            include('app/views/message/sendForm.php');
        }
    }

    public function showMessageThread($otherUserId) {
        $userId = $_SESSION['user_id'];
        $messages = $this->messageModel->getMessageThread($userId, $otherUserId);
        include('app/views/message/thread.php');
    }
}

?>
