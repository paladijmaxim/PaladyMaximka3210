<?php 

namespace src\View;

class View{
    private $templatesPath;

    public function __construct(string $templatesPath) // конструктор класса, который принимает абсолютный путь к папке с шаблонами и сохраняет путь в свойство $templatesPath
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, $vars=[], $code=200)
    {
        http_response_code($code); // установка кода овтета
        extract($vars); // импорт переменных из массива в тек таблицу 
        include $this->templatesPath.'/'.$templateName.'.php'; // подключения файла шаблона 
    }

    public function renderHtml2(string $templateName, $vars=[])
    {
        extract($vars);
        include $this->templatesPath.'/'.$templateName;
    }
}