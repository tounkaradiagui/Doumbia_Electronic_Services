<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "doumbia_electro";

$connection = mysqli_connect($server, $username, $password, $db);

// Vérifier la connexion
if (!$connection) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Définir l'encodage des caractères
mysqli_set_charset($connection, "utf8");
