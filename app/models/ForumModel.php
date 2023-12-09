<?php

class ForumModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTopics() {
        $query = "SELECT * FROM forum_topics";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
