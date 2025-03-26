<?php
namespace src\Models\Articles;

use src\Services\Db;
use src\Models\Users\User;

class Article
{
    private $id;
    private $name;
    private $text;
    private $authorId;

    // Геттеры
    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getText(): string { return $this->text; }
    public function getAuthorId(): int { return $this->authorId; }

    public function getAuthor(): ?User  // Возвращаемый тип может быть null
{
    if (!$this->authorId) {
        return null;  // или верните "анонимного" пользователя
    }
    return User::getById($this->authorId);
}

    // Сеттеры
    public function setName(string $name): void { $this->name = $name; }
    public function setText(string $text): void { $this->text = $text; }
    public function setAuthorId(int $authorId): void { $this->authorId = $authorId; }

    // Методы работы с БД
    public function save(): bool
    {
        $db = Db::getInstance();
        
        if ($this->id) {
            $sql = 'UPDATE articles SET name=:name, text=:text WHERE id=:id';
            $params = [':name' => $this->name, ':text' => $this->text, ':id' => $this->id];
        } else {
            $sql = 'INSERT INTO articles (name, text, author_id) VALUES (:name, :text, :author_id)';
            $params = [':name' => $this->name, ':text' => $this->text, ':author_id' => $this->authorId];
        }
        
        $result = $db->query($sql, $params, static::class);
        
        if (!$this->id) {
            $this->id = $db->getLastInsertId();
        }
        
        return (bool)$result;
    }

    public static function findAll(): array
    {
        return Db::getInstance()->query(
            'SELECT * FROM articles',
            [],
            static::class
        );
    }

    public static function getById(int $id): ?self
    {
        $result = Db::getInstance()->query(
            'SELECT * FROM articles WHERE id = :id',
            [':id' => $id],
            static::class
        );
        return $result[0] ?? null;
    }
}