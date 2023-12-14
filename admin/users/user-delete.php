<?php
require '../../config/function.php';

$deleteResult = checkUserId('id');

if(is_numeric($deleteResult)){
    $id = validate($deleteResult);
    $user = getUserById($id, "users");
    if($user['status'] == 200){
        $deleteUser = deleteFn($id, "users");
        if($deleteUser){
            redirect('./users.php', "L'utilisateur a été supprimée avec succès");
        }else{
            redirect('./users.php', "Erreur de suppression, Veuillez réessayer !");
        }
    }else{
        redirect('./users.php', $deleteResult);
    }

}else{
    redirect('./users.php', $deleteResult);
}