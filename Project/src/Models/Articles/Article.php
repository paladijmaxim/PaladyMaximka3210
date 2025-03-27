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

// Геттеры, т.е. методы для чтения свойств
    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getText(): string { return $this->text; }
    public function getAuthorId(): int { return $this->authorId; }
    public function getAuthor(): ?User {
    if (!$this->authorId) {
        return null; 
    }
    return User::getById($this->authorId);
    }
// Сеетры, т.е. методы для установки значений 
    public function setName(string $name): void { $this->name = $name; }
    public function setText(string $text): void { $this->text = $text; }
    public function setAuthorId(int $authorId): void { $this->authorId = $authorId; }
    public function save(): bool  // этот метод определяет, нужно ли делать insert or apdate 
    {
        $db = Db::getInstance();
        
        if ($this->id) { // если id найдется, то обновится текщаяя запись 
            $sql = 'UPDATE articles SET name=:name, text=:text WHERE id=:id';
            $params = [':name' => $this->name, ':text' => $this->text, ':id' => $this->id];
        } else { //  если нет, то создастся новая 
            $sql = 'INSERT INTO articles (name, text, author_id) VALUES (:name, :text, :author_id)';
            $params = [':name' => $this->name, ':text' => $this->text, ':author_id' => $this->authorId];
        }
        
        $result = $db->query($sql, $params, static::class);
        
        if (!$this->id) {
            $this->id = $db->getLastInsertId();
        }
        
        return (bool)$result;
    }

    public static function findAll(): array // метод для работы с коллекциями 
    {
        return Db::getInstance()->query( // возвращение массива всех статей из базы данных, при этом каждая статья - объект класса Article
            'SELECT * FROM articles',
            [],
            static::class
        );
    }

    public static function getById(int $id): ?self // метод для работы с коллекциями 
    {
        $result = Db::getInstance()->query(
            'SELECT * FROM articles WHERE id = :id',
            [':id' => $id],
            static::class
        );
        return $result[0] ?? null;  // вернет статью по ее id, если не найдет статью - null
    }

    public function delete(): void
{
    $sql = 'DELETE FROM articles WHERE id = :id';
    $db = Db::getInstance();
    $db->query($sql, [':id' => $this->id]);
}
}