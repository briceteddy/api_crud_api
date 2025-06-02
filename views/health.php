<?php
require_once '../config/database.php';

header('Content-Type: application/json');

try {
    $database = new Database();
    $db = $database->connect();

    if ($db) {
        http_response_code(200);
        echo json_encode([
            "status" => "OK",
            "message" => "API and database are reachable"
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "status" => "ERROR",
            "message" => "API is running, but database is not reachable"
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "ERROR",
        "message" => "Database connection failed",
        "error" => $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "ERROR",
        "message" => "Unexpected error",
        "error" => $e->getMessage()
    ]);
}