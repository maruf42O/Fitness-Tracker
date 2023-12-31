<?php

class MessageModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getMessagesByUserId($userId) {
        $query = "SELECT * FROM messages WHERE receiver_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }
}

?>
