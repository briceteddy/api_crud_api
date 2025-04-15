<?php
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Extract the endpoint and ID 
$uri = explode('/', trim($request, '/'));
$resource = $uri[1] ?? null;
$id = $uri[2] ?? null;

switch ($resource) {
    case 'tasks':
        if ($method === 'GET' && $id) {
            require './views/read.php'; // Get one task
        } elseif ($method === 'POST') {
            require './views/create.php'; // Create a task
        } elseif ($method === 'PUT' && $id) {
            require './views/update.php'; // Update a task
        } elseif ($method === 'DELETE' && $id) {
            require './views/delete.php'; // Delete a task
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Endpoint not found."]);
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(["message" => "Endpoint not found."]);
        break;
}