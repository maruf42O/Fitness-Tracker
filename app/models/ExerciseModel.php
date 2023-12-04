<?php

class ExerciseModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllExercises() {
        $query = "SELECT * FROM exercises";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Add functions for retrieving exercise details by ID, adding new exercises, etc.
}

?>
