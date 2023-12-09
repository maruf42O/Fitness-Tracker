<?php

class LiveWorkoutModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function scheduleLiveWorkout($instructorId, $dateTime, $description) {
        $query = "INSERT INTO live_workouts (instructor_id, date_time, description) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $instructorId, $dateTime, $description);
        $stmt->execute();
        $stmt->close();
    }
}

?>
