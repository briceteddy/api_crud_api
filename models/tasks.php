<?php
class Task {
    private $conn;
    private $table = "tasks";

    public $id;
    public $title;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET title = :title";
        $stmt = $this->conn->prepare($query);
    
        $this->title = htmlspecialchars(strip_tags($this->title));
        $stmt->bindParam(":title", $this->title);
    
        return $stmt->execute();
    }

   // Get one task by ID
   public function getOne() {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(":id", $this->id);

    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update one task by ID
public function updateOne() {
    $query = "UPDATE " . $this->table . " SET title = :title WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":id", $this->id);

    return $stmt->execute();
}

// Delete one task by ID
public function deleteOne() {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(":id", $this->id);

    return $stmt->execute();
}
}