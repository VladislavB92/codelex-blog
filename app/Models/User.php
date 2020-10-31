<?php

namespace App\Models;

class User
{
    private string $name;
    private string $email;
    private string $password;
    private ?int $id;

    public function __construct(
        string $name,
        string $email,
        string $password,
        ?int $id = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    public static function create(array $data): User
    {
        return new self(
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_BCRYPT)
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
