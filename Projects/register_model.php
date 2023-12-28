<?php

declare(strict_types=1);

function get_username(mysqli $connection, string $username)
{
    $query = "SELECT username FROM users WHERE username = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result()->fetch_assoc();
    return $result;
}

function get_email(mysqli $connection, string $email)
{
    $query = "SELECT email FROM users WHERE email = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("s", $email);
    $statement->execute();

    $result = $statement->get_result()->fetch_assoc();
    return $result;
}

function set_user(mysqli $connection, string $nom, string $username, string $email, string $phone, string $password)
{
    $query = "INSERT INTO users (`nom`, `username`, `email`, `password`, `phone`, `role`, `status`, `address`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $query);


    $options = [
        'cost' => 12
    ];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    mysqli_stmt_bind_param($stmt, "sssssssi", $nom, $username, $email, $hashedPassword, $phone, $role, $status, $address);
    $creatUserResult = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
