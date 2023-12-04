<?php

class BlogModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllBlogPosts() {
        $query = "SELECT * FROM blog_posts";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Add functions for retrieving blog post details by ID, adding new blog posts, etc.
}

?>
