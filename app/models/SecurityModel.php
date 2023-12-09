<?php

class SecurityModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function encryptData($data) {
        $encryptedData = password_hash($data, PASSWORD_DEFAULT);
        return $encryptedData;
    }
}

?>
