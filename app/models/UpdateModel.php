<?php

class UpdateModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function getLatestUpdates() {
        $query = "SELECT * FROM platform_updates ORDER BY date DESC LIMIT 5";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Add functions for adding new updates, marking updates as read, etc.
}

?>
