<?php

namespace App\Models;

use PDO;
use App\Database\Connection;

class Goal
{
    private $conn;
    
    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->connectToDatabase();
    }

    /**
     * Método responsável por retornar as metas pendentes do usuário
     * @param int $user_id
     * @return array 
     */
    public function getPendingGoals($user_id)
    {
        $sql = "SELECT id, desc_goal, dead_line, status_goal FROM goals WHERE user_id = ? AND status_goal = 'Pendente' ORDER BY dead_line ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Método responsável por retornar uma meta pelo seu ID
     * @param int $user_id
     * @param int $id_goal
     * @return array
     */
    public function getById($user_id, $id_goal)
    {
        $sql = "SELECT id, desc_goal, dead_line FROM goals WHERE user_id = ? AND id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $user_id);
        $stmt->bindValue(2, $id_goal);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Método responsável por retornar as metas pelo seu status de conclusão (canceladas ou concluídas)
     * @param int $user_id;
     * @param string $status_goal
     * @return array 
     */
    public function getByStatus($user_id, $status_goal)
    {
        $sql = "SELECT id, desc_goal, dead_line, status_goal FROM goals WHERE user_id = ? AND status_goal = ? ORDER BY dead_line ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $user_id);
        $stmt->bindValue(2, $status_goal);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Método responsável por inserir uma nova meta no banco de dados 
     * @param string $desc_goal 
     * @param string $dead_line
     * @param int $user_id
     */
    public function insert($desc_goal, $dead_line, $user_id)
    {
        $sql = "INSERT INTO goals (desc_goal, dead_line, user_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $desc_goal);
        $stmt->bindValue(2, $dead_line);
        $stmt->bindValue(3, $user_id);
        $stmt->execute();
    }

    /**
     * Método responsável por atualizar o status da meta modificando este campo no banco de dados
     * @param int $id_goal
     * @param int $user_id
     * @param string $status_goal
     */
    public function updateStatusGoal($id_goal, $user_id, $status_goal)
    {
        $sql = "UPDATE goals SET status_goal = ? WHERE id = ? AND user_id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $status_goal);
        $stmt->bindValue(2, $id_goal);
        $stmt->bindValue(3, $user_id);
        $stmt->execute();
    }

    /**
     * Método que modifica uma meta: sua descrição e seu prazo
     * @param int $id_goal
     * @param int $user_id
     * @param string $desc_goal
     * @param string $dead_line
     */
    public function updateGoal($id_goal, $user_id, $desc_goal, $dead_line)
    {
        $sql = "UPDATE goals SET desc_goal = ?, dead_line = ?, modified = NOW() WHERE id = ? AND user_id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $desc_goal);
        $stmt->bindValue(2, $dead_line);
        $stmt->bindValue(3, $id_goal);
        $stmt->bindValue(4, $user_id);
        $stmt->execute();
    }
}
