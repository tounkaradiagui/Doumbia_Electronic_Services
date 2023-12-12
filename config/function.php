<?php
session_start();
include("dbconnection.php");

function validate($inputData)
{
    global $connection;
    return mysqli_real_escape_string($connection, $inputData);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header("Location: " . $url);
    exit(0);
}

function displayMessage()
{
    if (isset($_SESSION['message'])) {
        echo
        '<div class="alert alert-success">
            <h4>' . $_SESSION['message'] . '</h4>
        </div>';

        unset($_SESSION['message']);
    }
}