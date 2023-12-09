<?php

class ForumController {
    private $forumModel;

    public function __construct() {
        $this->forumModel = new ForumModel();
    }

    public function showAllTopics() {
        $allTopics = $this->forumModel->getAllTopics();
        include('app/views/forum/allTopics.php');
    }

    public function showTopic($topicId) {
        $topic = $this->forumModel->getTopicById($topicId);
        $posts = $this->forumModel->getPostsByTopic($topicId);
        include('app/views/forum/topic.php');
    }

    public function createTopic() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $topicTitle = $_POST['topic_title'];
            $postContent = $_POST['post_content'];
            if (empty($topicTitle) || empty($postContent)) {
                echo "Both topic title and post content are required.";
                return;
            }
            $topicId = $this->forumModel->createTopic($userId, $topicTitle);
            $this->forumModel->createPost($userId, $topicId, $postContent);
            header("Location: /forum/topic/$topicId");
            exit();
        } else {
            include('app/views/forum/createTopic.php');
        }
    }
}

?>
