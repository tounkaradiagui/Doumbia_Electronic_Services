<?php
// include database connection
require 'dbconnection.php';
// include functions file
include 'function.php';

// Check if 'create' button is clicked
if (isset($_POST['create'])) {
    // get the input data from the form
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $role = validate($_POST['role']);
    $status = validate($_POST['status']);
    $address = validate($_POST['address']);

    // Create SQL query for inserting the data into the 'users' table
    $query = "INSERT INTO users (`nom`, `prenom`, `email`, `password`, `phone`, `role`, `status`, `address`) 
                VALUES ('$nom', '$prenom', '$email', '$password', '$phone', '$role', '$status', '$address')";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    // Check if the data was inserted successfully
    if ($result) {
        // If the data was inserted successfully, redirect to the 'users.php' page with a success message
        redirect("../admin/users/users.php", "Félicitations ! L'utilisateur a été ajouté avec succes.");
    } else {
        // If there was an error, redirect to the 'create-users.php' page with an error message
        redirect("../admin/users/create-users.php", "Erreur d'enregistrement, veuillez réessayer");
    }
}

// Check if the 'update' button is clicked
if (isset($_POST['update'])) {
    // get the input data from the form
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $role = validate($_POST['role']);
    $status = validate($_POST['status']);
    $address = validate($_POST['address']);

    // get the 'id' of the user to be updated
    $userId = validate($_POST['userId']);

    // Get the current data of the user from the 'users' table
    $user = getUserById($userId, "users");

    // Check if there was an error while fetching the data
    if ($user['status'] != 200) {
        // If there was an error, redirect to the 'user-edit.php' page with an error message
        redirect("../admin/users/user-edit.php?id=" . $userId, "Erreur de modification, veuillez réessayer");
    }

    // Create SQL query for updating the data in the 'users' table
    $query = "UPDATE users SET nom = '$nom', prenom = '$prenom', email = '$email', phone = '$phone', role = '$role', status = '$status', address = '$address'
            WHERE id = '$userId' ";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    // Check if the data was updated successfully
    if ($result) {
        // If the data was updated successfully, redirect to the 'users.php' page with a success message
        redirect("../admin/users/users.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
        // If there was an error, redirect to the 'create-users.php' page with an error message
        redirect("../admin/users/create-users.php", "Erreur de mise à jour, veuillez réessayer");
    }
}