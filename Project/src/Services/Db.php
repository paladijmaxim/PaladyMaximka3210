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
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): array
{
    $sth = $this->pdo->prepare($sql);
    $sth->execute($params);
    
    return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
}

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
}