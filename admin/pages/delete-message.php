<?php
require '../../config/function.php';

$delete = checkId('id');

if(is_numeric($delete)){
    $id = validate($delete);
    $message = getDataById($id, "contact");
    if($message['status'] == 200){
        $deletemessage = deleteFn($id, "contact");
        if($deletemessage){
            redirect('./messages.php', "Félicitations ! le message a été supprimé avec succès");
        }else{
            redirect('./messages.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./messages.php', $delete);
    }

}else{
    redirect('./messages.php', $delete);
}