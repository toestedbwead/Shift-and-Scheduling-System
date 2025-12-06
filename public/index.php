<?php

session_start();

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
// simple routing
$url = $_GET['url'] ?? 'login';
$urlParts = explode('/', trim($url, '/'));

$controllerName = ucfirst($urlParts[0] ?? 'Auth') . 'Controller';
$action = $urlParts[1] ?? 'index';

// load controller
$controllerFile = __DIR__ . "/../app/Controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = "\\App\\Controllers\\{$controllerName}";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        if (method_exists($controller, $action)) {
            $controller -> $action();
        } else {
            http_response_code(404);
            echo "404 - Action not found";
        }
    } else {
        http_response_code(404);
        echo "404 - Controller not found.";
    }
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
?>
