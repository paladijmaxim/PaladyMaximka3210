<?php
// src/Models/Comments/Comment.php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Services\Db;
use DateTime;

class Comment extends ActiveRecordEntity
{
    protected $text;
    protected $authorId;
    protected $articleId;
    protected $createdAt;

    public function getText(): string
    {
        return htmlspecialchars($this->text);
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getCreatedAt(): string
    {
        $date = new DateTime($this->createdAt);
        return $date->format('d.m.Y H:i');
    }

    public function setText(string $text): void
    {
        $this->text = trim($text);
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    public static function findAllByArticleId(int $articleId): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` 
                WHERE `article_id` = :article_id 
                ORDER BY `created_at` DESC';
        $result = $db->query($sql, [':article_id' => $articleId], static::class);
        return $result ?: [];
    }

    public static function deleteByArticleId(int $articleId): void
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM `'.static::getTableName().'` 
                WHERE `article_id` = :article_id';
        $db->query($sql, [':article_id' => $articleId]);
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function beforeSave(): void
    {
        if (empty($this->text)) {
            throw new \InvalidArgumentException('Пустое значение');
        }

        if (empty($this->authorId)) {
            throw new \InvalidArgumentException('Укажи автора');
        }

        if (empty($this->articleId)) {
            throw new \InvalidArgumentException('Укажи статью');
        }
    }
}