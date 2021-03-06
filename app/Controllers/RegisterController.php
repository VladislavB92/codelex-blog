<?php

namespace App\Controllers;

use Respect\Validation\Validator;
use App\Models\User;
use App\Database\DatabaseController;

class RegisterController
{
    public function __construct()
    {
        if (isset($_SESSION['auth_id'])) {
            header('Location: /');
        }
    }

    public function showRegistrationForm()
    {
        return require_once __DIR__  . '/../Views/RegisterView.php';
    }

    public function register()
    {
        // $_POST => name, email, password, password_confirmation
        $validEmail = Validator::email()->validate($_POST['email']);
        $validName = $_POST['name'] !== '';
        $validPassword = $_POST['password'] !== '' && $_POST['password_confirmation'] === $_POST['password'];

        if ($validEmail && $validName && $validPassword) {
            $user = User::create($_POST);

            $query = DatabaseController::query();
            $query->insert('users')
                ->values([
                    'name' => ':name',
                    'email' => ':email',
                    'password' => ':password'
                ])
                ->setParameters($user->toArray())
                ->execute();

            $_SESSION['auth_id'] = (int) $query->getConnection()->lastInsertId();

            return header('Location: /');
        }

        return header('Location: /register');
    }
}
