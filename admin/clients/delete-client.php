<?php
require '../../config/function.php';

$deleteResult = checkId('id');

if(is_numeric($deleteResult)){
    $id = validate($deleteResult);
    $client = getDataById($id, "clients");
    if($client['status'] == 200){
        $deleteUser = deleteFn($id, "clients");
        if($deleteUser){
            redirect('./lists-client.php', "Le a été supprimée avec succès");
        }else{
            redirect('./lists-client.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./lists-client.php', $deleteResult);
    }

}else{
    redirect('./lists-client.php', $deleteResult);
}