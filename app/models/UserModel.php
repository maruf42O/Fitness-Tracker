<?php

class UserModel {
    private $db; // Assume you have a database connection in $db

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($userData) {
        // Assume $userData is an associative array with user details
        // For simplicity, password should be hashed in a real-world scenario
        $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $userData['username'], $userData['email'], $hashedPassword);
        $stmt->execute();
        $stmt->close();
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    public function getUserById($userId) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    // Add functions for updating and deleting users as needed
}

?>
