<?php

class Application {
    public function __construct() {
        $this->init();
    }

    private function init() {
    }

    public function run() {
        $router = new Router();
        $router->route();
    }
}

$app = new Application();
$app->run();

?>