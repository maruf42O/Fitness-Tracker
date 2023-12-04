<?php

class ForumModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTopics() {
        $query = "SELECT * FROM forum_topics";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Add functions for retrieving posts in a topic, adding new topics, etc.
}

?>
