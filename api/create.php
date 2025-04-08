<?php
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["message" => "Méthode non autorisée."]);
    http_response_code(405); // Méthode non autorisée
    exit();
}


include_once '../config/database.php';
include_once '../models/tasks.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->title)) {
    $db = (new Database())->connect();
    $task = new Task($db);
    $task->title = $data->title;

    if ($task->create()) {
        echo json_encode(["message" => "Tâche ajoutée."]);
    } else {
        echo json_encode(["message" => "Erreur lors de la création."]);
    }
} else {
    echo json_encode(["message" => "Titre manquant."]);
}
