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

if (isset($_POST['updateUser'])) {
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $role = validate($_POST['role']);
    $status = validate($_POST['status']);
    $address = validate($_POST['address']);

    $userId = validate($_POST['userId']);

    $user = getUserById($userId, "users");

    if ($user['status'] != 200) {
        redirect("../admin/users/user-edit.php?id=" . $userId, "Erreur de modification, veuillez réessayer");
    }

    $query = "UPDATE users SET nom = '$nom', prenom = '$prenom', email = '$email', phone = '$phone', role = '$role', status = '$status', address = '$address'
            WHERE id = '$userId' ";

    $result = mysqli_query($connection, $query);

    if ($result) {
        redirect("../admin/users/users.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
        redirect("../admin/users/user-edit.php", "Erreur de mise à jour, veuillez réessayer");
    }
}

if (isset($_POST['settings'])) {
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

        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "sssssssi", $title, $slug, $small_description, $description, $meta_title, $meta_keyword, $meta_description, $address, $phone, $email);

            $settingResult = mysqli_stmt_execute($stmt);

            if ($settingResult) {
                redirect("../admin/pages/settings.php", "Félicitations ! Les informations du site ont été mise à jour avec succes.");
            } else {
                redirect("../admin/pages/settings.php", "Erreur d'enregistrement, veuillez réessayer");
            }

            mysqli_stmt_close($stmt);
        } else {
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
        if ($result) {
            redirect("../admin/pages/settings.php", "Félicitations ! Les informations du site ont été mise à jour avec succes.");
        } else {
            redirect("../admin/pages/settings.php", "Erreur d'enregistrement, veuillez réessayer");
        }
    }
}

if (isset($_POST['createSM'])) {
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


if (isset($_POST['updateSM'])) {
    $nom = validate($_POST['nom']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']);

    $smId = validate($_POST['smId']);

    $sm = getDataById($smId, "social_medias");

    if ($sm['status'] != 200) {
        redirect("../admin/pages/edit-social-media.php?id=" . $smId, "Erreur de modification, veuillez réessayer");
    }

    $query = "UPDATE social_medias SET nom = '$nom', url = '$url', status = '$status'
            WHERE id = '$smId' ";

    $result = mysqli_query($connection, $query);

    if ($result) {
        redirect("../admin/pages/lists-social-media.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
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
                VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $nom, $prenom, $email, $phone, $address);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            redirect("../admin/clients/lists-client.php", "Félicitations ! Le client a été ajouté avec succes.");
        } else {
            redirect("../admin/clients/create-client.php", "Erreur d'enregistrement, veuillez réessayer");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}

if (isset($_POST['updateClient'])) {
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $address = validate($_POST['address']);

    $clientId = validate($_POST['clientId']);

    $client = getDataById($clientId, "clients");

    if ($client['status'] != 200) {
        redirect("../admin/clients/edit-client.php?id=" . $clientId, "Erreur de modification, veuillez réessayer");
    }

    $query = "UPDATE clients SET nom = '$nom', prenom = '$prenom', email = '$email', phone = '$phone', address = '$address'
            WHERE id = '$clientId' ";

    $result = mysqli_query($connection, $query);

    if ($result) {
        redirect("../admin/clients/lists-client.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
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
    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "sssssssi", $title, $type_dispositif, $date_reparation, $description_probleme, $image, $cout_estime, $statut_reparation, $client_id);

        $repairResult = mysqli_stmt_execute($stmt);

        if ($repairResult) {
            redirect("../admin/repairs/lists-repair.php", "Félicitation ! La réparation a été ajoutée.");
        } else {
            redirect("../admin/repairs/create-repair.php", "Erreur d'insertion ! Veuillez reéssayer");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}


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


if (isset($_POST['createTool'])) {
    // echo "true";

    $numero_serie = validate($_POST['numero_serie']);
    $modele = validate($_POST['modele']);
    $reparation_id = validate($_POST['reparation_id']);

    $query = "INSERT INTO equipements (`numero_serie`, `modele`, `reparation_id`) VALUES (?, ?, ?)";


    $stmt = mysqli_prepare($connection, $query);


    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $numero_serie, $modele, $reparation_id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            redirect("../admin/tools/lists-tool.php", "Félicitations ! Le matériel a été ajouté avec succes.");
        } else {
            redirect("../admin/tolls/create-tool.php", "Erreur d'enregistrement, veuillez réessayer");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}


if (isset($_POST['updateTool'])) {
    $numero_serie = validate($_POST['numero_serie']);
    $modele = validate($_POST['modele']);
    $reparation_id = validate($_POST['reparation_id']);

    $toolId = validate($_POST['toolId']);

    $sm = getDataById($toolId, "equipements");

    if ($sm['status'] != 200) {
        redirect("../admin/tools/edit-tool.php?id=" . $toolId, "Erreur de modification, veuillez réessayer");
    }

    $query = "UPDATE equipements SET numero_serie = '$numero_serie', modele = '$modele', reparation_id = '$reparation_id'
            WHERE id = '$toolId' ";

    $result = mysqli_query($connection, $query);

    if ($result) {
        redirect("../admin/tools/lists-tool.php", "Félicitations ! Infos mise à jour avec succes.");
    } else {
        redirect("../admin/tools/lists-tool.php", "Erreur de mise à jour, veuillez réessayer");
    }
}

if (isset($_POST['createServices'])) {
    // echo "Param";
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);

    $image = validate($_FILES['image']['name']);
    $imagePath = __DIR__ . '/images/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    $description = validate($_POST['description']);

    $meta_title = validate($_POST['meta_title']);
    $meta_keyword = validate($_POST['meta_keyword']);
    $meta_description = validate($_POST['meta_description']);

    $status = validate($_POST['status']);

    $insert = "INSERT INTO activites (`title`, `slug`, `image`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `status`)
                    VALUE ( ? , ? , ? , ? , ? , ? , ? , ?)";

    $stmt = mysqli_prepare($connection, $insert);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "sssssssi", $title, $slug, $image, $description, $meta_title, $meta_keyword, $meta_description, $status);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            redirect("../admin/services/services.php", "Félicitations ! Le nouveau service été ajouté avec succes.");
        } else {
            redirect("../admin/services/services.php", "Erreur d'enregistrement, veuillez réessayer");
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}


if (isset($_POST['updateServices'])) {
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);

    $image = validate($_FILES['image']['name']);
    $imagePath = __DIR__ . '/images/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    $description = validate($_POST['description']);

    $meta_title = validate($_POST['meta_title']);
    $meta_keyword = validate($_POST['meta_keyword']);
    $meta_description = validate($_POST['meta_description']);
    $status = validate($_POST['status']);

    $serviceId = validate($_POST['serviceId']);
    $service = getDataById($serviceId, "activites");

    if ($service['status'] != 200) {
        redirect("../admin/services/edit-service.php?id=".$serviceId, "Erreur de modification, veuillez réessayer");
    }

    $updateData = "UPDATE activites SET title = '$title', slug = '$slug', image = '$image', description = '$description',
     meta_title = '$meta_title', meta_keyword = '$meta_keyword', meta_description = '$meta_description',
      status = '$status' WHERE id = '$serviceId' ";

    $updateResult = mysqli_query($connection, $updateData);

    if ($updateResult) {
        redirect("../admin/services/services.php", "Félicitations ! Le service a été mis à jour avec succès.");
    } else {
        redirect("../admin/services/services.php", "Erreur ! Erreur de modification.");
    }

}


if (isset($_POST['submitMessage'])) {
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $phone = validate($_POST['phone']);
    $service_type = validate($_POST['service_type']);
    $message = validate($_POST['message']);

    $query = "INSERT INTO enquiries (`nom`, `prenom`, `phone`, `service_type`, `message`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssss', $nom, $prenom, $phone, $service_type, $message);

        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($result) {
            redirect("../services.php", "Félicitations ! Votre demande de renseignement a été envoyée.");
        } else {
            redirect("../services.php", "Erreur d'envoi, veuillez réessayer");
        }
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}

if (isset($_POST['contactUs'])) {
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $message = validate($_POST['message']);

    $query = "INSERT INTO contact (`nom`, `prenom`, `email`, `phone`,  `message`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssss', $nom, $prenom, $email, $phone, $message);

        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($result) {
            redirect("../services.php", "Félicitations ! Votre message a été envoyé.");
        } else {
            redirect("../services.php", "Erreur d'envoi, veuillez réessayer");
        }
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connection);
    }
}

