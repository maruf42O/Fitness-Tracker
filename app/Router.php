<?php

class Router {
    public function route() {
        $request = new Request();
        $controllerName = $request->getController();
        $actionName = $request->getAction();

        $controllerPath = "app/controllers/{$controllerName}Controller.php";
        if (file_exists($controllerPath)) {
            include_once($controllerPath);
            $controllerClassName = "App\\Controllers\\{$controllerName}Controller";
            $controller = new $controllerClassName();

            if (method_exists($controller, $actionName)) {
                $controller->$actionName();
            } else {
                echo "Action not found!";
            }
        } else {
            echo "Controller not found!";
        }
    }
}
?>