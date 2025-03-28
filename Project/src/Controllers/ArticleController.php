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
            throw new NotFoundException();
        }

        $comments = Comment::findAllByArticleId($id) ?? []; 
        
        $this->view->renderHtml('article/show', [
            'article' => $article,
            'author' => $article->getAuthor(),
            'comments' => $comments
        ]);
    }


    public function delete(int $id)
    {
        $article = Article::getById($id);
        if (!$article) {
            throw new NotFoundException();
        }
        $article->delete();
        header("Location: http://localhost/PHP/Project/www/");
    }
    

    public function create(){
        return $this->view->renderHtml('article/create');
    }


    public function edit(int $id){
        $article = Article::getById($id);
        return $this->view->renderHtml('/article/edit', ['article'=>$article]);
    }


    public function update(int $id)
{
    $article = Article::getById($id);
    if (!$article) {
        throw new NotFoundException();
    }
    $article->setName($_POST['name']);
    $article->setText($_POST['text']);
    $article->save();
    header("Location: http://localhost/PHP/Project/www/");
}

    public function store()
    {
        $article = new Article();
        $article->setName($_POST['name']);
        $article->setText($_POST['text'] ?? '');
        $article->setAuthorId(1); 
        $article->save();
        header("Location: http://localhost/PHP/Project/www/"); 
    }
}