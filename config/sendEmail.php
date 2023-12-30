<?php
// Include necessary files for database connection and functions
require 'dbconnection.php';
include 'function.php';
require_once '../vendor/autoload.php';

// Check if the 'contactUs' form has been submitted
if(isset($_POST['contactUs'])){
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
}

// Email configuration settings
$host = "smtp.gmail.com";      // SMTP host
$port = "587";                 // SMTP port
$sslOrTls = "tls";             // SSL or TLS encryption
$setUsername = "tounkaradiagui@gmail.com";  // Sender's email address
$setPassword = "osmss";          // Sender's email password

// Email details
$subject = "Nouvelle demande de renseignement";  // Email subject
$emailAddress = "tounkaradiagui@gmail.com";      // Sender's email address
$sendEmailTo = "devdiagui@gmail.com";        // Recipient's email address

// Email content with inline styles for HTML
$content = '
        <div style="max-width: 600px; margin: 0 auto; background-color: #f8f9fa; padding: 20px;">
            <h2 style="color: #007bff;">Une personne a envoyé une demande de renseignements concernant votre entreprise.</h2>
        </div>
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px;">
            <h3 style="color: #007bff;">Nom: ' . $nom . '</h3>
            <h3 style="color: #007bff;">Prénom: ' . $prenom . '</h3>
            <h3 style="color: #007bff;">Email: ' . $email . '</h3>
            <h3 style="color: #007bff;">Numéro de Téléphone: ' . $phone . '</h3>
            <h3 style="color: #007bff;">Message: ' . $message . '</h3>
        </div>
    ';


// Create the Transport
$transport = (new Swift_SmtpTransport($host, $port, $sslOrTls))
  ->setUsername($setUsername)
  ->setPassword($setPassword);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subject))
  ->setFrom([$emailAddress => 'Doumbia Electronique'])
  ->setTo([$sendEmailTo])
  ->setBody($content, 'text/html');

// Send the message
$result = $mailer->send($message);
if($result){
    redirect("../contact.php", " Votre email a bien été envoyé ! Nous vous remercions de votre contact et nous vous contacterons
    pour une réponse ou pour un rendez-vous.");
}