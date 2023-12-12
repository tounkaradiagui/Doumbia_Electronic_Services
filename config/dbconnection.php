<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "electronic";

$connection = mysqli_connect($server, $username, $password, $db);

if(!$connection){
    die("Erreur de connexion". mysqli_connect_error());
}