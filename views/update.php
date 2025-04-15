<?php
require_once '../controllers/TaskController.php';

$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'] ?? null;

if ($id && $title) { 
    $controller = new TaskController();
    $result = $controller->updateTask($id, $title);

    echo json_encode(["message" => $result ? "Task updated successfully." : "Failed to update task."]);
} else {
    echo json_encode(["message" => "ID and Title are required."]);
}