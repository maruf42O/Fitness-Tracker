<?php

class UpdateModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getLatestUpdates() {
        $query = "SELECT * FROM platform_updates ORDER BY date DESC LIMIT 5";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>
