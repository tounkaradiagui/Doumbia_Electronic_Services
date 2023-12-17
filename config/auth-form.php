<?php
require "function.php";

if(isset($_POST['login'])){
    // echo "logged in";
    $validateEmail = validate($_POST["email"]);
    $validatePassword = validate($_POST["password"]);

    $email = filter_var($validateEmail, FILTER_SANITIZE_EMAIL);
    $password = filter_var($validatePassword, FILTER_SANITIZE_STRING);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if($result){

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_assoc($result);

            if($row['role'] == 'admin'){

                redirect('../admin/dashboard/index.php', "Bienvenue sur votre Tableau de Bord");
                
                if($row['status'] == 'inactive'){
                    redirect("../login.php","Votre compte a été banni. Veuillez contacter l'administrateur.");
                }

                $_SESSION['auth'] = true;
                $_SESSION['userType'] = $row['role'];
                $_SESSION['auth-user'] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email']
                ];
                
            }else{

                redirect('../index.php', "Bienvenue sur Doumbia Electronic");
                
                $_SESSION['auth'] = true;
                $_SESSION['userType'] = $row['role'];
                $_SESSION['auth-user'] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email']
                ];
            }
        }else{
            redirect("../login.php","L'adresse e-mail ou le mot de passe est incorrect.");
        }
    }else{
        die("Error : ".mysqli_error($connection));
    }
};
