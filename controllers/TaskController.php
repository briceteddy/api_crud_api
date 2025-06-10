
<?php
require_once '../models/Task.php';
require_once '../config/database.php';

class TaskController {
    private $task;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->task = new Task($db);
    }

    public function createTask($title) {
        $this->task->title = $title;
        return $this->task->create();
    }

    // Get one task
    public function getTask($id) {
        $this->task->id = $id;
        return $this->task->getOne();
    }

    // Update one task
    public function updateTask($id, $title) {
        $this->task->id = $id;
        $this->task->title = $title;
        return $this->task->updateOne();
    }

    // Delete one task
    public function deleteTask($id) {
        $this->task->id = $id;
        return $this->task->deleteOne();
    }
}