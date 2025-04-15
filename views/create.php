<?php
require_once '../controllers/TaskController.php';

$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'] ?? null;

if ($title) {
    $controller = new TaskController();
    $result = $controller->createTask($title);

    echo json_encode(["message" => $result ? "Task created successfully." : "Failed to create task."]);
} else {
    echo json_encode(["message" => "Title is required."]);
}