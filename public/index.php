<?php

require_once __DIR__ . '/routes/web.php';

function handleRequest($routes) {
    $path = $_SERVER['REQUEST_URI'];
    $path = strtok($path, '?');

    if (isset($routes[$path])) {
        $controllerAction = $routes[$path];
        list($controller, $action) = explode('@', $controllerAction);

        require_once __DIR__ . "/controllers/{$controller}.php";

        $controllerInstance = new $controller();
        $controllerInstance->$action();
    } else {
        http_response_code(404);
        echo "Página não encontrada.";
    }
}

handleRequest($routes);

?>