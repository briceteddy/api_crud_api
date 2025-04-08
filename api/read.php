<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(["message" => "Méthode non autorisée."]);
    http_response_code(405); // Méthode non autorisée
    exit();
}

include_once '../config/database.php';
include_once '../models/tasks.php';

$db = (new Database())->connect();
$task = new Task($db);

$stmt = $task->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $tasks = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $tasks[] = [
            'id' => $id,
            'title' => $title,
            'created_at' => $created_at
        ];
    }

    echo json_encode($tasks);
} else {
    echo json_encode(["message" => "Aucune tâche trouvée."]);
}
?>