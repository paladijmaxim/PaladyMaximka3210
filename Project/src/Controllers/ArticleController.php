<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;
use src\Services\Db;
use src\Models\Articles\Article;
use src\Models\Users\User;
use Exception;

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

    public function show(int $id)
    {
        $article = Article::getById($id);
        if (!$article) {
            $this->view->renderHtml('main/error', [], 404);
            return;
        }
        $comments = Comment::findAllByArticleId($id) ?? []; 
        $this->view->renderHtml('article/show', [
            'article' => $article,
            'author' => $article->getAuthor(),
            'comments' => $comments
        ]);
    }

    public function create(){
        return $this->view->renderHtml('article/create');
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


    public function store()
{
    try {
        if (empty($_POST['name'])) {
            throw new \InvalidArgumentException('Название статьи обязательно');
        }

        $article = new \src\Models\Articles\Article(); 
        $article->setName($_POST['name']);
        $article->setText($_POST['text'] ?? '');
        $article->setAuthorId(1); 
        if ($article->save()) {
            header('Location: /');
            exit();
        }
    } catch (\Exception $e) {
        error_log($e->getMessage());
        $this->view->renderHtml('article/create', [
            'error' => $e->getMessage(),
            'name' => $_POST['name'] ?? ''
        ]);
    }
}
}