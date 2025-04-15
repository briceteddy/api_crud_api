<?php
require_once '../controllers/TaskController.php';

if ($id) { 
    $controller = new TaskController();
    $result = $controller->deleteTask($id);

    echo json_encode(["message" => $result ? "Task deleted successfully." : "Failed to delete task."]);
} else {
    echo json_encode(["message" => "ID is required."]);
}