<?php

require  __DIR__ .  '../../vendor/autoload.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($url)
{
    case '/':
        App\Controllers\GoalController::index();
    break;

    case '/login':
        App\Controllers\UserController::authUser();
    break;

    case '/register':
        App\Controllers\UserController::createUser();
    break;

    case '/logout':
        App\Controllers\UserController::logout();
    break;

    case '/form/goal/create':
        App\Controllers\GoalController::createGoal();
    break;

    case '/goal/filter':
        App\Controllers\GoalController::filterGoals($_GET['status']);
    break;

    case '/goal/edit':
        App\Controllers\GoalController::editGoal();
    break;

    case '/goal/conclude':
        App\Controllers\GoalController::changeStatus();
    break;
    case '/goal/cancel':
        App\Controllers\GoalController::changeStatus();
    break;

    default:
        echo "<h1>ERRO 404 | PÁGINA NÃO ENCONTRADA</h1>";
    break;

}