<?php
require_once 'database.php';

// Instancier la classe Database
$db = new Database();

// Tester la connexion
$conn = $db->connect();

if ($conn) {
    echo "Connexion réussie à la base de données.";
} else {
    echo "Échec de la connexion à la base de données.";
}
?>