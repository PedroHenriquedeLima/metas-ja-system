<?php

namespace App\Controllers;

use App\Models\Goal as GoalModel;

class GoalController
{
    /**
     * Página inicial das metas
     */
    public static function index()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $user_id = $_SESSION['user_id'];

        $goal_model = new GoalModel();
        $goals = $goal_model->getPendingGoals($user_id);

        include '../app/Views/dashboard.php';
    }

    /**
     * Criação de uma nova meta
     */
    public static function createGoal()
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $desc_goal = $_POST['desc_goal'];
        $dead_line = $_POST['dead_line'];
        $goal_model = new GoalModel();

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($desc_goal)) {
                $error = "Digite a meta";
            } else {
                if (empty($dead_line)) {
                    $error = "Defina a data limite";
                } else {
                    $goal_model->insert($desc_goal, $dead_line, $user_id);
                    header('Location: /');
                }
            }
        }

        include '../app/Views/form_goal.php';
    }

    /**
     * Filtrar metas por status
     */
    public static function filterGoals($status)
    {
        session_start();

        $user_id = $_SESSION['user_id'];
        $display_status = '';

        $goal_model = new GoalModel();

        switch ($status) {
            case 'Concluída':
                $display_status = 'Concluídas';
                $goals = $goal_model->getByStatus($user_id, $status);
                break;

            case 'Cancelada':
                $display_status = 'Canceladas';
                $goals = $goal_model->getByStatus($user_id, $status);
                break;

            default:
                header('Location: /');
                break;
        }
        include '../app/Views/dashboard_filter.php';
    }

    /**
     * Alterar status da meta
     */
    public static function changeStatus()
    {
        session_start();

        $id_goal = $_GET['id'];
        $status_goal = $_GET['status'];
        $user_id = $_SESSION['user_id'];

        $goal_model = new GoalModel();

        $goal_model->updateStatusGoal($id_goal, $user_id, $status_goal);

        header('Location: /');
        exit();
    }

    /**
     * Edição de meta
     */
    public static function editGoal()
    {
        session_start();

        $user_id = $_SESSION['user_id'];
        $goal_model = new GoalModel();

        // Verificar se o formulário foi submetido via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_goal = intval($_POST['id_goal']); // Usar o campo oculto do formulário
            $desc_goal = $_POST['desc_goal'];
            $dead_line = $_POST['dead_line'];

            if (empty($desc_goal)) {
                $error = "Não deixe a descrição vazia";
            } else {
                if (empty($dead_line)) {
                    $error = "Não esqueça a data limite";
                } else {
                    $goal_model->updateGoal($id_goal, $user_id, $desc_goal, $dead_line);
                    header('Location: /');
                }
            }
        } else {
            // Se o formulário não foi submetido, buscar os detalhes da meta
            $id_goal = intval($_GET['id']);
            $goal = $goal_model->getById($user_id, $id_goal);
            $error = '';

            include '../app/Views/edit_goal.php';
        }
    }
}
