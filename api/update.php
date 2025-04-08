<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    echo json_encode(["message" => "Méthode non autorisée."]);
    http_response_code(405); // Méthode non autorisée
    exit();
}


include_once '../config/database.php';
include_once '../models/tasks.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->title)) {
    $db = (new Database())->connect();
    $task = new Task($db);
    $task->id = $data->id;
    $task->title = $data->title;

    if ($task->update()) {
        echo json_encode(["message" => "Tâche mise à jour."]);
    } else {
        echo json_encode(["message" => "Erreur lors de la mise à jour."]);
    }
} else {
    echo json_encode(["message" => "Données incomplètes."]);
}
