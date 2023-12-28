<?php

declare(strict_types=1);

function is_input_empty(string $nom, string $username, string $email, string $phone, string $password)
{
    if (empty($nom) || empty($username) || empty($email) || empty($phone) || empty($password)) {
        return true;
    } else{
        return false;
    } 
}
function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else{
        return false;
    } 
}
function is_username_taken(mysqli $connection, string $username)
{
    if (get_username($connection, $username)) {
        return true;
    } else{
        return false;
    } 
}
function is_email_registered(mysqli $connection, string $email)
{
    if (get_email($connection, $email)) {
        return true;
    } else{
        return false;
    } 
}
function create_user(mysqli $connection, string $nom, string $username, string $email, string $phone, string $password)
{
   set_user($connection, $nom, $username, $email, $phone, $password);
}