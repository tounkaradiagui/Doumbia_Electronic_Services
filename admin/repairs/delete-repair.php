<?php
require '../../config/function.php';

$deleteResult = checkId('id');

if(is_numeric($deleteResult)){
    $id = validate($deleteResult);
    $repair = getDataById($id, "reparations");
    if($repair['status'] == 200){
        $deleteUser = deleteFn($id, "reparations");
        if($deleteUser){
            redirect('./lists-repair.php', "La réparation a été supprimée avec succès");
        }else{
            redirect('./lists-repair.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./lists-repair.php', $deleteResult);
    }

}else{
    redirect('./lists-repair.php', $deleteResult);
}