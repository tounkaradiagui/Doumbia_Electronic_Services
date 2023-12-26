<?php
require '../../config/function.php';

$delete = checkId('id');

if(is_numeric($delete)){
    $id = validate($delete);
    $demande = getDataById($id, "enquiries");
    if($demande['status'] == 200){
        $deletedemande = deleteFn($id, "enquiries");
        if($deletedemande){
            redirect('./demande.php', "Félicitations ! le message a été supprimé avec succès");
        }else{
            redirect('./demande.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./demande.php', $delete);
    }

}else{
    redirect('./demande.php', $delete);
}