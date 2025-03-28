<?php
namespace src\Models\Articles;

use src\Services\Db;
use src\Models\Users\User;

class Article
{
    private $id;
    private $name;
    private $text;
    private $author_id; 

    // Геттеры
    public function getId(): int {return $this->id;}
    public function getName(): string {return $this->name;}
    public function getText(): string {return $this->text;}
    public function getAuthorId(): int {return $this->author_id;} // Обновили геттер
    
    public function getAuthor(): ?User {
        if (!$this->author_id) {
            return null; 
        }
        return User::getById($this->author_id);
    }
    
    // Сеттеры
    public function setName(string $name): void {$this->name = $name;}
    public function setText(string $text): void {$this->text = $text;}
    public function setAuthorId(int $authorId): void {$this->author_id = $authorId;} // Обновили сеттер
    
    public function save(): bool
    {
        $db = Db::getInstance();
        
        if ($this->id) {
            $sql = 'UPDATE articles SET name=:name, text=:text, author_id=:author_id WHERE id=:id';
            $params = [
                ':name' => $this->name, 
                ':text' => $this->text, 
                ':author_id' => $this->author_id,
                ':id' => $this->id
            ];
        } else {
            $sql = 'INSERT INTO articles (name, text, author_id) VALUES (:name, :text, :author_id)';
            $params = [
                ':name' => $this->name, 
                ':text' => $this->text, 
                ':author_id' => $this->author_id
            ];
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

    public function delete(): void
    {
        $sql = 'DELETE FROM articles WHERE id = :id';
        $db = Db::getInstance();
        $db->query($sql, [':id' => $this->id]);
    }
}