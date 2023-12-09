<?php

class BlogModel {
    private $db; 

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllBlogPosts() {
        $query = "SELECT * FROM blog_posts";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
