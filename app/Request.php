<?php

class Request {
    public function getController() {
        return isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';
    }

    public function getAction() {
        return isset($_GET['action']) ? $_GET['action'] : 'index';
    }
}
?>