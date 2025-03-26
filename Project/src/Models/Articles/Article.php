<?php
namespace src\Models\Articles;

use src\Services\Db;

class Article
{
    private $id;
    private $name;
    private $text;
    private $authorId;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

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
        
        return (bool)$db->query($sql, $params);
    }

    public static function findAll(): array
{
    $db = Db::getInstance();
    return $db->query(
        'SELECT * FROM articles',
        [],
        static::class // Указываем класс для преобразования результатов
    );
}
    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM articles WHERE id = :id',
            [':id' => $id],
            static::class
        );
        return $result[0] ?? null;
    }

}