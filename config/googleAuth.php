<?php
include 'function.php';
require_once '../vendor/autoload.php';


$client = new Google_Client();
$client->setClientId('375334045526-3fcdtgr9ublpger4p049rr00l4euoo0b.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://127.0.0.1/web-app/Doumbia_Electro/index.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['googleAuth'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['googleAuth']);
    $_SESSION['access_token'] = $token;

    // Redirigez l'utilisateur après l'authentification
    redirect('../index.php', "Welcome");
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);

    // Récupérez les informations de l'utilisateur
    
    $oauth = new Google_Service_Oauth($client);
    $userInfo = $oauth->userinfo->get();

    // Récupérer le prénom et le nom
    $firstName = $userInfo->getGivenName();
    $lastName = $userInfo->getFamilyName();

    // Utiliser le prénom et le nom comme nécessaire
    echo 'Prénom: ' . $firstName . '<br>';
    echo 'Nom: ' . $lastName . '<br>';

    // Utilisez $userInfo pour accéder aux données de l'utilisateur
    echo 'Bienvenue, ' . htmlspecialchars($userInfo->getName());
} else {
    // Redirigez l'utilisateur vers la page d'authentification Google
    $authUrl = $client->createAuthUrl();
    echo "<a href='$authUrl'>Se connecter avec Google</a>";
}
