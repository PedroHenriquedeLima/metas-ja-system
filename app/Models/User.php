<?php

namespace App\Models;

use App\Database\Connection as Connection;
use PDO;

class User 
{
    private $conn;
    private $id, $name, $email, $password;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->connectToDatabase();
    }

    /**
     * Método responsável por retornar os dados do usuário. É utilizado no login, para verificar a existência
     * do usuário no banco
     * @param string $email
     * @return array
     */
    public function getUser($email)
    {
        // Consulta SQL para buscar usuário pelo email
        $sql = "SELECT id, email, pass FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por inserir/cadastrar o usuário no banco de dados
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function insert($name, $email, $password)
    {
        // Consulta SQL para inserir novo usuário
        $sql = "INSERT INTO users (name_user, email, pass) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
        $stmt->execute();
    }
}
