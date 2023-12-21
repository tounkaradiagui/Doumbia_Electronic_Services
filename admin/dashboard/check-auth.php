<?php

if(isset($_SESSION['auth'])){
    
    if(isset($_SESSION['loggedInUserRole'])){

        $role = validate($_SESSION['loggedInUserRole']);
        $email = validate($_SESSION['loggedInUser']['email']);

        $query = "SELECT * FROM users WHERE email ='$email' AND role = '$role' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if($result){
            if(mysqli_num_rows($result)  == 0){
                logoutSession();
                redirect('../../login.php', "Vous n'êtes pas autorisé à acceder à cette page !");
            }
            else{
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($row['role'] !== 'admin'){
                    logoutSession();
                    redirect('../../login.php', "Vous n'êtes pas autorisé à acceder à cette page !");
                }
                if($row['status'] == 'inactive'){
                    logoutSession();
                    redirect('../../login.php', "Votre compte a été désactiver. Veuillez contacter l'administrateur !");
                }
            }
        }else{ 
            logoutSession();
            redirect('../../login.php', "Erreur de connexion. Veuillez réessayer !");
        }
    }
}else{
    redirect('../../login.php', "Veuillez vous connecter pour continuer !");
}