<?php

class SearchModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function searchWorkouts($keyword) {
        $query = "SELECT * FROM workout_plans WHERE title LIKE ? OR description LIKE ?";
        $stmt = $this->db->prepare($query);
        $keyword = "%" . $keyword . "%";
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }
}

?>
