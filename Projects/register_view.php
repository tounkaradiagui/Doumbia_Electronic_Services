<?php

declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])){
        $errors = $_SESSION['errors_signup'];
        echo  "<br>";
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
        
        unset($_SESSION['errors_signup']);
    }else if(isset($_GET['signup']) && isset($_GET['signup']) === "success"){
        echo  "<br>";
        echo '<div class="alert alert-success" role="alert">You have successfully registered! Please log in to continue.</div>';
    }
}