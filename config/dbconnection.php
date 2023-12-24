<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "doumbia_electro";

$connection = mysqli_connect($server, $username, $password, $db);

if(!$connection){
    die("Erreur de connexion". mysqli_connect_error());
}