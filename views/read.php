<?php
require_once '../controllers/TaskController.php';

$id = $id ?? null; 

if ($id) {
    $controller = new TaskController();
    $task = $controller->getTask($id);

    if ($task) {
        echo json_encode($task);
    } else {
        echo json_encode(["message" => "Task not found."]);
    }
} else {
    echo json_encode(["message" => "ID is required."]);
}