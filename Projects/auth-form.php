<?php
require_once "./function.php";
require_once "../register_model.php";
require_once "../register_controller.php";
// require_once "session.php";


if(isset($_POST['login'])){
    // echo "logged in";
    $validateEmail = validate($_POST["email"]);
    $validatePassword = validate($_POST["password"]);

    $email = filter_var($validateEmail, FILTER_SANITIZE_EMAIL);
    $password = filter_var($validatePassword, FILTER_SANITIZE_STRING);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if($result){
        // $userRow = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($row['role'] == 'admin'){

                
                if($row['status'] == 'inactive'){
                    redirect("../login.php","Votre compte a été banni. Veuillez contacter l'administrateur.");
                }
                    
                $_SESSION['auth'] = true;
                $_SESSION['loggedInUserRole'] = $row['role'];
                $_SESSION['loggedInUser'] = [
                    'name' => $row['name'],
                    'email' => $row['email']
                ];

                redirect('../admin/dashboard/index.php', "Bienvenue sur votre Tableau de Bord");
                
            }else{
                
                if($row['status'] == 'inactive'){
                    redirect("../login.php","Votre compte a été banni. Veuillez contacter l'administrateur.");
                }

                $_SESSION['auth'] = true;
                $_SESSION['loggedInUserRole'] = $row['role'];
                $_SESSION['loggedInUser'] = [
                    'name' => $row['name'],
                    'email' => $row['email']
                ];
                
                redirect('../index.php', "Bienvenue sur Doumbia Electronic");
            }
        }else{
            redirect("../login.php","L'adresse e-mail ou le mot de passe est incorrect.");
        }
    }else{
        die("Error : ".mysqli_error($connection));
    }
};

if (isset($_POST['register'])) {
    $nom = validate($_POST["nom"]);
    $username = validate($_POST["username"]);
    $email = validate($_POST["email"]);
    $phone = validate($_POST["phone"]);
    $password = validate($_POST["password"]);

    $errors = [];

    if (is_input_empty($nom, $username, $email, $phone, $password)) {
        $errors['empty_input'] = "Veuillez remplir tous les champs !";
    }

    if (is_email_invalid($email)) {
        $errors['invalid_email'] = "Veuillez indiquer une adresse email valide !";
    }

    if (is_username_taken($connection, $username)) {
        $errors['username_taken'] = "Le nom d'utilisateur existe déjà ! Essayer un autre";
    }

    if (is_email_registered($connection, $email)) {
        $errors['email_used'] = "L'adresse email existe déjà ! Essayer une autre";
    }

    if (!empty($errors)) {
        $_SESSION['errors_signup'] = $errors;
        redirect("../register.php", "Erreur d'inscription, veuillez réessayer");
        die();
    }

    create_user($connection, $nom, $username, $email, $phone, $password);
    redirect("../index.php?signup=success", "Inscription, réussie");
    die();
} else {
    redirect("../register.php", "Erreur d'inscription, veuillez réessayer");
    die("Erreur de connexion" . mysqli_connect_error());
}



ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 60 * 30, // 30 minutes
    'path'     => '/',
    'domain'   => 'localhost',
    'secure'   => true,
    'httponly' => true,
]);

session_start();

if (!isset($_SESSION["last_regeneration"])) {
    regenerate_session_id();
} else {

    $time_passed = time() - $_SESSION["last_regeneration"];
    $interval = 60 * 30;

    if ($time_passed >= $interval) {
        regenerate_session_id();
    }
}

function regenerate_session_id()
{
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}