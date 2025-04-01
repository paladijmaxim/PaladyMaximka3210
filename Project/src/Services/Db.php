<?php
namespace src\Services;

class Db
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        $dbOptions = require('settings.php');
        $this->pdo = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): array
    {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $className); // указываем PDO преобразовывать каждую строку в объект указанного класса
            return $stmt->fetchAll();
        
    }

    public function getLastInsertId(): int
    {
        return (int)$this->pdo->lastInsertId();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}