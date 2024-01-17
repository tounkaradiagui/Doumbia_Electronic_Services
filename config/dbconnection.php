<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..');
$dotenv->load();

// Accédez aux variables comme suit
$server = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$db = $_ENV['DB_NAME'];

$connection = mysqli_connect($server, $username, $password, $db);

// Vérifier la connexion
if (!$connection) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Définir l'encodage des caractères
mysqli_set_charset($connection, "utf8");
