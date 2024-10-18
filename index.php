<?php

    require_once dirname(__FILE__,2) . '\projectcrud\public\routes\web.php';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestUri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    
    
    function matchRoute($routes, $method, $uri) {
        foreach ($routes as $route) {
            if ($route['method'] !== $method) continue;
            $pattern = preg_replace('/\{[^\/]+\}/', '([^/]+)', rtrim($route['path'], '/'));
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                array_shift($matches);
                return ['handler' => $route['handler'], 'params' => $matches];
            }
        }
        return null;
    }
    
    $routeMatch = matchRoute($routes, $requestMethod, $requestUri);
    
    if ($routeMatch) {
        list($controllerName, $methodName) = explode('@', $routeMatch['handler']);
    
        $controllerFile = dirname(__FILE__,2) . "\projectcrud\src\controllers\{$controllerName}.php";
    
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
    
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $methodName)) {
                    call_user_func_array([$controller, $methodName], $routeMatch['params']);
                    exit;
                } else {
                    http_response_code(500);
                    echo "Método '{$methodName}' não encontrado no controller '{$controllerName}'.";
                    exit;
                }
            } else {
                http_response_code(500);
                echo "Classe '{$controllerName}' não encontrada.";
                exit;
            }
        } else {
            http_response_code(500);
            echo "Arquivo do controller '{$controllerName}.php' não encontrado.";
            exit;
        }
    } else {
        http_response_code(404);
        echo "Página não encontrada.";
    }

?>