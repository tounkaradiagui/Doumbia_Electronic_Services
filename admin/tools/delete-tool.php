<?php
require '../../config/function.php';

$deleteResult = checkId('id');

if(is_numeric($deleteResult)){
    $id = validate($deleteResult);
    $tool = getDataById($id, "equipements");
    if($tool['status'] == 200){
        $deleteUser = deleteFn($id, "equipements");
        if($deleteUser){
            redirect('./lists-tool.php', "Le matériel a été supprimée avec succès");
        }else{
            redirect('./lists-tool.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./lists-tool.php', $deleteResult);
    }

}else{
    redirect('./lists-tool.php', $deleteResult);
}