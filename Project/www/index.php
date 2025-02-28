<?php
    function myAutoload($className){
    }

    spl_autoload_register(function(string $className){
        require_once dirname(__DIR__).'\\'.$className.'.php';
    });
    
    $controller = new src\Controllers\MainController;
    $findroute = false;

    $route = $_GET['route'] ?? '';
    $pattern = "~^hello/(.*)$~";
    $pattern1 = "~^$~";
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $findroute = true;
        $controller->sayHello($matches);
    }
    prog_match($pattern1, $route, $matches);
    if (!empty($matches)) {
        $findroute = true;
        $controller->main();
    }

    if (!$findroute) echo 'Page not found (404)';

    $user = new src\Models\Users\User('Max');
    $article = new src\Models\Articles\Article('title', 'text', $user);
