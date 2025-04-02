<?php

namespace src\Controllers;
use src\View\View;
// use src\Services\Db;

class MainController {
    private $view;
    // private $db;
    
    public function __construct(){
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
        // $this->db = Db::getInstance(); // как раз тут и используем паттерн сингльтон 
    }
    
    public function sayHello(string $name){
        $this->view->renderHtml('main/hello', ['name' => $name]);
    }

    public function sayBye(string $name){
        $this->view->renderHtml('main/bye', ['name' => $name]);
    }
}