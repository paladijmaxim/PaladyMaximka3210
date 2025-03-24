<?php

namespace src\Controllers;

use src\View\View;
use src\Services\Db;
use src\Models\Articles\Article;
use src\Models\Users\User;
use ReflectionObject;

class ArticleController {
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
        $this->db = Db::getInstance();
    }

    public function index() {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main', ['articles' => $articles]);
    }

    public function show(int $id) {
        $article = Article::getById($id);

        if (!$article) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }

        $author = $article->getAuthor();

        $this->view->renderHtml('article/show', [
            'article' => $article,
            'author' => $author,
        ]);
    }

    public function create(){
        return $this->view->renderHtml('article/create');
    }

    public function store(){
         $article = new Article;
         $article->name = $_POST['name'];
         $article->text = $_POST['text'];
         $article->authorId = 1;
         $article->save();
         return header('Location:http://localhost/PHP/Project/www/');
     }

    public function edit(int $id){
        $article = Article::getById($id);
        return $this->view->renderHtml('/article/edit', ['article'=>$article]);
    }

    public function update(int $id){
        $article = Article::getById($id);
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->save();
        return $this->view->renderHtml('article/show', ['article'=>$article]);
    }

    public function save(): void
    {
        if ($this->id) {
            $sql = 'INSERT INTO articles (name, text, author_id) VALUES (:name, :text, :author_id)';
            $params = [':name' => $this->name, ':text' => $this->text, ':author_id' => $this->authorId];
        }
        $this->db->query($sql, $params);
    }
}