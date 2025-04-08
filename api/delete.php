<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    echo json_encode(["message" => "Méthode non autorisée."]);
    http_response_code(405); // Méthode non autorisée
    exit();
}


include_once '../config/database.php';
include_once '../models/tasks.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $db = (new Database())->connect();
    $task = new Task($db);
    $task->id = $data->id;

    if ($task->delete()) {
        echo json_encode(["message" => "Tâche supprimée."]);
    } else {
        echo json_encode(["message" => "Erreur lors de la suppression."]);
    }
} else {
    echo json_encode(["message" => "ID manquant."]);
}
