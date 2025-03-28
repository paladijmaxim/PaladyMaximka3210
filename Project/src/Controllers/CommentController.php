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
        exit;
    }

    public function edit(int $id)
    {
        try {
            $comment = Comment::getById($id);
            if (!$comment) {
                throw new \Exception('Комментарий не найден');
            }
            $this->view->renderHtml3('comment/edit.php', [
                'comment' => $comment,
                'error' => null
            ]);
        } catch (\Exception $e) {
            $this->view->renderHtml3('comment/edit.php', [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update(int $id)
    {
        try {
            $comment = Comment::getById($id);
            if (!$comment) {
                throw new \Exception('Комментарий не найден');
            }
            
            if (empty($_POST['text'])) {
                throw new \Exception('Текст комментария не может быть пустым');
            }
            
            $comment->setText($_POST['text']);
            $comment->save();

            header("Location: /article/{$comment->getArticleId()}#comment{$comment->getId()}");
            exit;
        } catch (\Exception $e) {
            $this->view->renderHtml('comment/edit.php', [
                'comment' => $comment ?? null,
                'error' => $e->getMessage()
            ]);
        }
    }
}