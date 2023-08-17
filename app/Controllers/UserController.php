<?php

namespace App\Controllers;

use App\Models\User as UserModel;

class UserController
{
    /**
     * Autenticação do usuário
     */
    public static function authUser()
    {
        session_start();

        // Verificar se o usuário já está logado
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = '';

            if (empty($email) || empty($password)) {
                $error = 'Por favor, preencha todos os campos';
            } else {
                $user_model = new UserModel();
                $user = $user_model->getUser($email);

                if (!$user) {
                    $error = 'Usuário não cadastrado, clique em cadastrar-se';
                } else if ($user['email'] != $email || !password_verify($password, $user['pass'])) {
                    $error = 'Dados incorretos';
                } else {
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: /');
                    exit();
                }
            }
        }

        include '../app/Views/login.php';
    }

    /**
     * Logout do usuário
     */
    public static function logout()
    {
        session_start();
        session_destroy();

        header('Location: /login');
        exit();
    }

    /**
     * Criação/cadastro de usuário
     */
    public static function createUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_model = new UserModel();

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($name)) {
                $error = "Digite seu nome, por favor";
            } else {
                if (empty($email)) {
                    $error = "Digite seu email, corretamente";
                } else {
                    if (empty($password)) {
                        $error = "Digite sua senha";
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $user_model->insert($name, $email, $hashed_password);
                        header('Location: /login');
                    }
                }
            }
        }

        include '../app/Views/register.php';
    }
}
