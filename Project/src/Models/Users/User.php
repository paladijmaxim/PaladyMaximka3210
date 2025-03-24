<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function setName(string $name): void
    {
        $this->nickname = $name;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getName(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}