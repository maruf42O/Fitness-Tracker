<?php

class ExerciseModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllExercises() {
        $query = "SELECT * FROM exercises";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
