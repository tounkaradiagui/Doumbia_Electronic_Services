<?php
require '../../config/function.php';

$deleteResult = checkId('id');

if (is_numeric($deleteResult)) {
    $id = validate($deleteResult);
    $service = getDataById($id, "activites");

    if ($service['status'] == 200) {
            $deleteService = deleteFn($id, "activites");
        if ($deleteService) {
            redirect('./services.php', "Le service a été supprimé avec succès");
        } else {
            redirect('./services.php', "Erreur de suppression, veuillez réessayer !");
        }
    } else {
        redirect('./services.php', $deleteResult);
    }
} else {
    redirect('./services.php', $deleteResult);
}

