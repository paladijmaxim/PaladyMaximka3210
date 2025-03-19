<?php

namespace src\Models\Users;

class User {
    private $id;
    private $nickname;
    private $email;
    private $isConfirmed;
    private $role;
    private $passwordHash;
    private $authToken;
    private $createdAt;

    public function __set($name, $value) 
    {
        $camelCaseName = $this->underscoreToCamelcase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelcase(string $name): string
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    public function getNickname() 
    {
        return $this->nickname;
    }
}