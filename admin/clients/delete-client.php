<?php
require '../../config/function.php';

$deleteResult = checkId('id');

if(is_numeric($deleteResult)){
    $id = validate($deleteResult);
    $client = getDataById($id, "clients");
    if($client['status'] == 200){
        $deleteClient = deleteFn($id, "clients");
        if($deleteClient){
            redirect('./lists-client.php', "Le client a été supprimée avec succès");
        }else{
            redirect('./lists-client.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./lists-client.php', $deleteResult);
    }

}else{
    redirect('./lists-client.php', $deleteResult);
}