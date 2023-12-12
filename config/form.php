<?php
require 'dbconnection.php';
include 'function.php';

if(isset($_POST['create'])){
    // echo "true";
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $role = validate($_POST['role']);
    $status = validate($_POST['status']);
    $address = validate($_POST['address']);

    $query =  "INSERT INTO users (`nom`, `prenom`, `email`, `password`, `phone`, `role`, `status`, `address`) VALUES ('$nom', '$prenom', '$email', '$password', '$role', '$phone', '$status', '$address')";
    $result = mysqli_query($connection, $query);

    if($result){
        redirect("../admin/users/users.php", "Félicitations ! L'utilisateur a été ajouté avec succes.");
    }else{
        redirect("../admin/users/create-users.php", "Erreur d'enregistrement, veuillez réessayer");
    }
    
}else{
    echo "error";
}