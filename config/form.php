<?php
// include database connection
require 'dbconnection.php';
// include functions file
include 'function.php';

// Check if 'create user' button is clicked
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

// Check if the 'update user' button is clicked
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

if(isset($_POST['settings'])){
    // echo "Param";

    // get the input data from the form
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);
    $description = validate($_POST['description']);

    $meta_title = validate($_POST['meta_title']);
    $meta_keyword = validate($_POST['meta_keyword']);
    $meta_description = validate($_POST['meta_description']);
    
    $address = validate($_POST['address']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    
    $settingId = validate($_POST['settingsId']);

    if($settingId == 'insertData'){
        $insert = "INSERT INTO settings (
                            `title`, 
                            `slug`, 
                            `small_description`, 
                            `description`, 
                            `meta_title`, 
                            `meta_keyword`, 
                            `meta_description`, 
                            `address`, 
                            `phone`, 
                            `email`
                        )
                    VALUE (
                        '$title',
                        '$slug',
                        '$small_description',
                        '$description',
                        '$meta_title',
                        '$meta_keyword',
                        '$meta_description',
                        '$address',
                        '$phone',
                        '$email'
                    )";
        $result = mysqli_query($connection, $insert);
    }

    if(is_numeric($settingId)){
        $query = "UPDATE settings 
                SET 
                    title ='$title',
                    slug ='$slug',
                    small_description ='$small_description',
                    description ='$description',
                    meta_title ='$meta_title',
                    meta_keyword ='$meta_keyword',
                    meta_description ='$meta_description',
                    address ='$address',
                    phone ='$phone',
                    email ='$email'

                WHERE id = '$settingId'
                ";
        $result = mysqli_query($connection, $query);
    }
    
    // Check if the data was inserted successfully
    if ($result) {
        // If the data was inserted successfully, redirect to the 'settings.php' page with a success message
        redirect("../admin/pages/settings.php", "Félicitations ! Les informations du site ont été mise à jour avec succes.");
    } else {
        // If there was an error, redirect to the 'settings.php' page with an error message
        redirect("../admin/pages/settings.php", "Erreur d'enregistrement, veuillez réessayer");
    }


}

if(isset($_POST['createSM'])){
    // echo "true";

    // get the input data from the form
    $nom = validate($_POST['nom']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']);
   
    // Create SQL query for inserting the data into the 'social media' table
    $query = "INSERT INTO social_medias (`nom`, `url`, `status`) 
                VALUES ('$nom', '$url', '$status')";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    // Check if the data was inserted successfully
    if ($result) {
        // If the data was inserted successfully, redirect to the 'lists-social-media.php' page with a success message
        redirect("../admin/pages/lists-social-media.php", "Félicitations ! Le réseau social a été ajouté avec succes.");
    } else {
        // If there was an error, redirect to the 'create-social-media.php' page with an error message
        redirect("../admin/users/create-social-media.php", "Erreur d'enregistrement, veuillez réessayer");
    }
}


if (isset($_POST['updateSM'])) {
    // get the input data from the form
    $nom = validate($_POST['nom']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']);

    // get the 'id' of the user to be updated
    $smId = validate($_POST['smId']);

    // Get the current data of the user from the 'social media' table
    $sm = getDataById($smId, "social_medias");

    // Check if there was an error while fetching the data
    if ($sm['status'] != 200) {
        // If there was an error, redirect to the 'user-edit.php' page with an error message
        redirect("../admin/pages/edit-social-media.php?id=" . $smId, "Erreur de modification, veuillez réessayer");
    }

    // Create SQL query for updating the data in the 'social media' table
    $query = "UPDATE social_medias SET nom = '$nom', url = '$url', status = '$status'
            WHERE id = '$smId' ";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    // Check if the data was updated successfully
    if ($result) {
        // If the data was updated successfully, redirect to the 'users.php' page with a success message
        redirect("../admin/pages/lists-social-media.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
        // If there was an error, redirect to the 'create-users.php' page with an error message
        redirect("../admin/pages/lists-social-media.php", "Erreur de mise à jour, veuillez réessayer");
    }
}