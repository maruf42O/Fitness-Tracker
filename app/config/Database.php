<?php

class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'fitness_tracker';

    public function getConnection() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}

?>