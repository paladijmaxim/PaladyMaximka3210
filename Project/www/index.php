<?php
    function myAutoload($className){
    }

    spl_autoload_register(function(string $className){
        require_once dirname(__DIR__).'\\'.$className.'.php';
    });
 
    $controller = new src\Controllers\MainController;
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $controller->sayHello($_GET['name']);
    } 
    else $controller->main();
    // var_dump($_GET('route'));
    $user = new src\Models\Users\User('Max');
    $article = new src\Models\Articles\Article('title', 'text', $user);
