<?php
// include database connection
require 'dbconnection.php';
// include functions file
include 'function.php';

if (isset($_POST['createUser'])) {
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $role = validate($_POST['role']);
    $status = validate($_POST['status']);
    $address = validate($_POST['address']);

    $query = "INSERT INTO users (`nom`, `prenom`, `email`, `password`, `phone`, `role`, `status`, `address`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $nom, $prenom, $email, $password, $phone, $role, $status, $address);

        $creatUserResult = mysqli_stmt_execute($stmt);

        if ($creatUserResult) {
            redirect("../admin/users/users.php", "Félicitations ! L'utilisateur a été ajouté avec succes.");
        } else {
            redirect("../admin/users/create-users.php", "Erreur d'enregistrement, veuillez réessayer");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}

// Check if the 'update user' button is clicked
if (isset($_POST['updateUser'])) {
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
        redirect("../admin/users/user-edit.php", "Erreur de mise à jour, veuillez réessayer");
    }
}

if (isset($_POST['settings'])) {
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

    if ($settingId == 'insertData') {
        $insert = "INSERT INTO settings (`title`, `slug`, `small_description`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `address`, `phone`, `email`)
                    VALUE ('?','?','?','?','?','?','?','?','?','?')";

        $stmt = mysqli_prepare($connection, $insert);

        if($stmt){

            mysqli_stmt_bind_param($stmt, "sssssssi", $title, $slug, $small_description, $description, $meta_title, $meta_keyword, $meta_description, $address, $phone, $email);
    
            $settingResult = mysqli_stmt_execute($stmt);
    
            // Check if the data was inserted successfully
            if ($settingResult) {
                // If the data was inserted successfully, redirect to the 'settings.php' page with a success message
                redirect("../admin/pages/settings.php", "Félicitations ! Les informations du site ont été mise à jour avec succes.");
            } else {
                // If there was an error, redirect to the 'settings.php' page with an error message
                redirect("../admin/pages/settings.php", "Erreur d'enregistrement, veuillez réessayer");
            }

            mysqli_stmt_close($stmt);

        }else{
            echo "Erreur de préparation de la requête : " . mysqli_error($connection);
        }

    }

    if (is_numeric($settingId)) {
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
}

// Check if the 'social media' button is clicked
if (isset($_POST['createSM'])) {
    // echo "true";

    // get the input data from the form
    $nom = validate($_POST['nom']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']);

    $query = "INSERT INTO social_medias (`nom`, `url`, `status`) VALUES (?, ?, ?)";


    $stmt = mysqli_prepare($connection, $query);


    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $nom, $url, $status);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            redirect("../admin/pages/lists-social-media.php", "Félicitations ! Le réseau social a été ajouté avec succes.");
        } else {
            redirect("../admin/users/create-social-media.php", "Erreur d'enregistrement, veuillez réessayer");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}


// Check if the 'social media' update button is clicked
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

if (isset($_POST['createClient'])) {
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $address = validate($_POST['address']);

    $query = "INSERT INTO clients (`nom`, `prenom`, `email`, `phone`, `address`) 
                VALUES ('$nom', '$prenom', '$email', '$phone', '$address')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        redirect("../admin/clients/lists-client.php", "Félicitations ! Le a été ajouté avec succes.");
    } else {
        redirect("../admin/clients/create-client.php", "Erreur d'enregistrement, veuillez réessayer");
    }
}


// Check if the 'update client' button is clicked
if (isset($_POST['updateClient'])) {
    // get the input data from the form
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $address = validate($_POST['address']);

    // get the 'id' of the client to be updated
    $clientId = validate($_POST['clientId']);

    // Get the current data of the client from the 'clients' table
    $client = getDataById($clientId, "clients");

    // Check if there was an error while fetching the data
    if ($client['status'] != 200) {
        // If there was an error, redirect to the 'edit-client.php' page with an error message
        redirect("../admin/clients/edit-client.php?id=" . $clientId, "Erreur de modification, veuillez réessayer");
    }

    // Create SQL query for updating the data in the 'clients' table
    $query = "UPDATE clients SET nom = '$nom', prenom = '$prenom', email = '$email', phone = '$phone', address = '$address'
            WHERE id = '$clientId' ";

    // Execute the SQL query
    $result = mysqli_query($connection, $query);

    // Check if the data was updated successfully
    if ($result) {
        // If the data was updated successfully, redirect to the 'lists-client.php' page with a success message
        redirect("../admin/clients/lists-client.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
        // If there was an error, redirect to the 'create-clients.php' page with an error message
        redirect("../admin/clients/edit-client.php", "Erreur de mise à jour, veuillez réessayer");
    }
}



if (isset($_POST['createRepair'])) {
    $title = validate($_POST['title']);
    $type_dispositif = validate($_POST['type_dispositif']);
    $date_reparation = validate($_POST['date_reparation']);
    $description_probleme = validate($_POST['description_probleme']);


    $directory = __DIR__ . '/images';

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    // Gestion du téléchargement de l'image
    $image = validate($_FILES['image']['name']);
    $imagePath = __DIR__ . '/images/' . $image;

    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    $cout_estime = validate($_POST['cout_estime']);
    $statut_reparation = validate($_POST['statut_reparation']);

    $client_id = validate($_POST['client_id']);

    $inserRepairData = "INSERT INTO reparations 
    (`title`, `type_dispositif`, `date_reparation`, `description_probleme`, `image`, `cout_estime`, `statut_reparation`, `client_id`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $inserRepairData);

    mysqli_stmt_bind_param($stmt, "sssssssi", $title, $type_dispositif, $date_reparation, $description_probleme, $image, $cout_estime, $statut_reparation, $client_id);

    $repairResult = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    if ($repairResult) {
        redirect("../admin/repairs/lists-repair.php", "Félicitation ! La réparation a été ajoutée.");
    } else {
        redirect("../admin/repairs/create-repair.php", "Erreur d'insertion ! Veuillez reéssayer");
    }
}


// La réparation a bien été modifiée pour le client
//             <strong>".['firstname']." ".['lastname']."</strong>. Vous pouvez maintenant cons
//             ulter la fiche de cette réparation


if (isset($_POST['updateRepair'])) {
    $id = validate($_POST['id']);
    $title = validate($_POST['title']);
    $type_dispositif = validate($_POST['type_dispositif']);
    $date_reparation = validate($_POST['date_reparation']);
    $description_probleme = validate($_POST['description_probleme']);

    $image = validate($_FILES['image']['name']);
    $imagePath = __DIR__ . '/images/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    $cout_estime = validate($_POST['cout_estime']);
    $statut_reparation = validate($_POST['statut_reparation']);
    $client_id = validate($_POST['client_id']);

    $repair = getDataById($id, "reparations");

    if ($repair['status'] != 200) {
        redirect("../admin/repairs/edit-repair.php?id=" . $id, "Erreur de modification, veuillez réessayer");
    }

    $updateRepairData = "UPDATE reparations SET
                        title = '$title',
                        type_dispositif = '$type_dispositif',
                        date_reparation = '$date_reparation',
                        description_probleme = '$description_probleme',
                        image = '$image',
                        cout_estime = '$cout_estime',
                        statut_reparation = '$statut_reparation',
                        client_id = '$client_id'
                        WHERE id = $id";

    $updateResult = mysqli_query($connection, $updateRepairData);

    if ($updateResult) {
        redirect("../admin/repairs/lists-repair.php", "Félicitation ! La réparation a été mise à jour.");
    } else {
        redirect("../admin/repairs/edit-repair.php?id=$id", "Erreur de mise à jour ! Veuillez réessayer");
    }
}
