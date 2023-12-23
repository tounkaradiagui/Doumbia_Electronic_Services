<?php
require '../../config/function.php';

$delete = checkId('id');

if(is_numeric($delete)){
    $id = validate($delete);
    $sm = getDataById($id, "social_medias");
    if($sm['status'] == 200){
        $deleteSm = deleteFn($id, "social_medias");
        if($deleteSm){
            redirect('./lists-social-media.php', "Félicitations ! le réseau social a été supprimé avec succès");
        }else{
            redirect('./lists-social-media.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./lists-social-media.php', $delete);
    }

}else{
    redirect('./lists-social-media.php', $delete);
}