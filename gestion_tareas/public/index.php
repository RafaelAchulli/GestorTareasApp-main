<?php
require_once '../config/database.php';
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'TaskController';
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';
require_once "../app/controllers/{$controller}.php";
$controllerInstance = new $controller();
$controllerInstance->$action();