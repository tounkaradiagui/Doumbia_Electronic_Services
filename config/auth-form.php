<?php
require_once "./function.php";

if (isset($_POST['login'])) {
    $email = validate(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
    $password = validate($_POST["password"]);

    if (is_login_input_empty($email,$password)) {
        redirect("../login.php", "Veuillez remplir tous les champs !");
    } else {
        $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if ($row && password_verify($password, $row['password'])) {
                if ($row['status'] == 'inactive') {
                    redirect("../login.php", "Votre compte a été banni. Veuillez contacter l'administrateur.");
                }

                $_SESSION['auth'] = true;
                $_SESSION['loggedInUser'] = [
                    'id' => $row['id'],
                    'nom' => $row['nom'],
                    'prenom' => $row['prenom'],
                    'email' => $row['email'],
                    'role' => $row['role']
                ];

                if ($row['role'] == 'admin') {
                    redirect('../admin/dashboard/index.php', "Bienvenue sur votre Tableau de Bord");
                } else {
                    redirect('../index.php', "Bienvenue sur Doumbia Electronic");
                }
            } else {
                redirect("../login.php", "L'adresse e-mail ou le mot de passe est incorrect.");
            }
        } else {
            die("Error : " . mysqli_error($connection));
        }
    }
}


if (isset($_POST['register'])) {
    $nom = validate($_POST["nom"]);
    $prenom = validate($_POST["prenom"]);
    $phone = validate($_POST["phone"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $password_confirmation = validate($_POST["password_confirmation"]);

    // Validation des champs vides
    if (is_register_input_empty($nom, $prenom, $phone, $email, $password, $password_confirmation)) {
        redirect("../register.php", "Veuillez remplir tous les champs !");
    } else if (is_email_invalid($email)) {
        redirect("../register.php", "Veuillez indiquer une adresse email valide !");
    } else if ($password !== $password_confirmation) {
        redirect("../register.php", "Les mots de passe ne correspondent pas !");
    } else if (is_email_registered($connection, $email)) {
        redirect("../register.php", "L'adresse email existe déjà ! Choisissez une autre adresse email.");
    } else {

        // Ajoutez votre logique d'insertion dans la base de données ici
        // Utilisez des requêtes préparées pour plus de sécurité
        $query = "INSERT INTO users (`nom`, `prenom`, `phone`, `email`, `password`) 
        VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($connection, $query);

        // Aucune erreur, procédez à l'inscription
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $nom, $prenom, $phone, $email, $hashedPassword);

            $creatUser = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($creatUser) {
                redirect("../login.php", "Inscription réussie. Connectez-vous maintenant !");
            } else {
                redirect("../register.php", "Erreur de connexion");
            }

        } else {
            echo "Erreur de préparation de la requête : " . mysqli_error($connection);
        }
    }
} else {
    // Si le formulaire n'a pas été soumis, redirigez vers la page d'inscription
    redirect("../register.php", "Erreur de connexion");
}

