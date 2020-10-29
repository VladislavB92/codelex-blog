<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

use App\Database\DatabaseController;

class AccountController
{
    public function loadAccountView()
    {
        return require_once __DIR__  . '/../Views/AccountView.php';
    }

    public function createUser()
    {
        $userName = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT );
        // By default

        DatabaseController::query()
            ->insert('users')
            ->values([
                'name' => ':name',
                'email' => ':email',
                'password' => ':password'
            ])
            ->setParameters([
                'name' => $userName,
                'email' => $email,
                'password' => $hashedPassword
            ])
            ->execute();

        header('Location: /account');
    }

    public function login()
    {
        
    }
}
