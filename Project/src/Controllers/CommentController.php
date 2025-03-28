<?php
namespace src\Controllers;

use src\View\View;
use src\Models\Comments\Comment;
use src\Models\Articles\Article;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
    }

    public function store(int $articleId)
    {
        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId(1); 
        $comment->setArticleId($articleId);
        $comment->save();
        header("Location: /article/{$articleId}#comment{$comment->getId()}");
    }

    public function edit(int $id)
    {
        $comment = Comment::getById($id);
        if (!$comment) {
            throw new \Exception('Комментарий не найден');
        }
        $this->view->renderHtml3('comment/edit.php', [
            'comment' => $comment,
            'error' => null
        ]);
    }

    public function update(int $id)
    {
        $comment = Comment::getById($id); 
        $comment->setText($_POST['text']);
        $comment->save();
        $redirectUrl = dirname($_SERVER['SCRIPT_NAME']) . '/article/' . $comment->getArticleId() . '#comment' . $comment->getId();
        header("Location: $redirectUrl");
    }
}