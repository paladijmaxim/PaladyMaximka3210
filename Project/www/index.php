<?php

spl_autoload_register(function(string $className) {
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    $fullPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . $filePath;
    
    if (file_exists($fullPath)) {
        require_once $fullPath;
    } else {
        throw new Exception("{$fullPath}");
    }
});

$findRoute = false;
$route = $_GET['route'] ?? '';

$patterns = require 'route.php';
foreach ($patterns as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $findRoute = true;
        unset($matches[0]);
        $controllerClass = $controllerAndAction[0];
        $action = $controllerAndAction[1];
        $controller = new $controllerClass();
        $controller->$action(...$matches);
        break;
    }
}
if (!$findRoute) echo "Page not found (404)";