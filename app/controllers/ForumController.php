<?php

class ForumController {
    private $forumModel;

    public function __construct() {
        // Initialize the necessary model
        $this->forumModel = new ForumModel();
    }

    public function showAllTopics() {
        // Handle displaying all forum topics
        // Example: Fetch forum topics and display them
        $allTopics = $this->forumModel->getAllTopics();

        // Display the forum topics
        include('app/views/forum/allTopics.php');
    }

    public function showTopic($topicId) {
        // Handle displaying posts in a specific forum topic
        // Example: Fetch topic details and posts and display them
        $topic = $this->forumModel->getTopicById($topicId);
        $posts = $this->forumModel->getPostsByTopic($topicId);

        // Display the forum topic and posts
        include('app/views/forum/topic.php');
    }

    public function createTopic() {
        // Handle creating a new forum topic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process forum topic creation form submission
            // Example: Validate inputs and create the topic (you should handle this in ForumModel)
            $userId = $_SESSION['user_id']; // Assuming you have a valid user session
            $topicTitle = $_POST['topic_title'];
            $postContent = $_POST['post_content'];

            // Validate inputs (you should add more validation)
            if (empty($topicTitle) || empty($postContent)) {
                // Display an error message
                echo "Both topic title and post content are required.";
                return;
            }

            // Create the forum topic and the first post (you should handle this in ForumModel)
            $topicId = $this->forumModel->createTopic($userId, $topicTitle);
            $this->forumModel->createPost($userId, $topicId, $postContent);

            // Redirect to the created forum topic
            header("Location: /forum/topic/$topicId");
            exit();
        } else {
            // Display the forum topic creation form
            include('app/views/forum/createTopic.php');
        }
    }

    // Add other forum-related methods as needed
}

?>
