<?php

namespace App\Database;

use PDO;
use PDOException;

class Connection 
{
    private $host, $dbname, $user, $pass;

    // Método para conectar ao banco de dados
    public function connectToDataBase()
    {
        
        $this->host = "localhost";       // Endereço do servidor de banco de dados
        $this->dbname = "goals_manager_system";  // Nome do banco de dados
        $this->user = 'root';            // Usuário do banco de dados
        $this->pass = '';                // Senha do banco de dados

        try 
        {
            // Criar a string DSN (Data Source Name) para a conexão PDO
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";

            // Criar uma instância da classe PDO para estabelecer a conexão
            $conn = new PDO($dsn, $this->user, $this->pass);

            // Retornar a conexão
            return $conn;

        } catch (PDOException $e) {
            // Em caso de erro, exibir mensagem de erro
            echo "erro: " . $e->getMessage();
        }
    }
}
