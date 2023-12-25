<?php
// Start session
session_start();

// Include database connection file
require "dbconnection.php";

/**
 * Validate the input data by escaping special characters and trimming the whitespace
 * 
 * @param string $inputData - The input data to be validated
 * 
 * @return string - The validated data
 */
function validate($inputData)
{
    global $connection;

    $validate = mysqli_real_escape_string($connection, $inputData);
    return trim($validate);
}

/**
 * Redirect the user to the specified URL with a message
 * 
 * @param string $url - The URL to redirect the user to
 * @param string $message - The message to be displayed
 */
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header("Location: " . $url);
    exit(0);
}

/**
 * Display the message stored in the session if it exists
 */
function displayMessage()
{
    if (isset($_SESSION['message'])) {
        echo
        '<div class="alert alert-success">
            <h6>' . $_SESSION['message'] . '</h6>
        </div>';

        unset($_SESSION['message']);
    }
}

/**
 * Check if the user ID exists in the GET request and return the ID if it exists
 * 
 * @param string $userId - The name of the user ID in the GET request
 * 
 * @return string - The user ID or an error message
 */
function checkUserId($userId)
{
    if (isset($_GET[$userId])) {
        // echo "ok";
        if ($_GET[$userId] !== null) {
            return $_GET[$userId];
        } else {

            return "L'utilisateur est introuvable";
        }
    } else {
        return "L'utilisateur est introuvable";
    }
}

function checkId($msId)
{
    if (isset($_GET[$msId])) {
        // echo "ok";
        if ($_GET[$msId] !== null) {
            return $_GET[$msId];
        } else {

            return "Id est introuvable";
        }
    } else {
        return "Id est introuvable";
    }
}

/**
 * Get all data from the specified table
 * 
 * @param string $data - The name of the table to retrieve data from
 * 
 * @return mixed - The result set containing all the data from the specified table
 */
function getData($data)
{
    global $connection;
    $table = validate($data);

    // Get all users from the database and store them in an array
    $query = "SELECT * FROM $table WHERE deleted = 0";
    $result = mysqli_query($connection, $query);
    return $result;
}

/**
 * Edit the data of the specified table and ID
 * 
 * @param int $id - The ID of the record to be edited
 * @param string $table - The name of the table to be edited
 * 
 * @return array - An array containing the status code, error message, and the edited data
 */
function getUserById($id, $table)
{
    global $connection;
    $validateTable = validate($table);
    $validateId = validate($id);

    $query = "SELECT * FROM $validateTable WHERE id = '$validateId' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 200,
                'message' => "Successfully fetched",
                'data' => $row
            ];
            return $response;
        } else {

            $response = [
                'status' => 500,
                'error' => mysqli_error($connection),
            ];
            return $response;
        }
    } else {
        $response = [
            'status' => 500,
            'error' => mysqli_error($connection),
        ];
        return $response;
    }
}
function getDataById($id, $table)
{
    global $connection;
    $validateTable = validate($table);
    $validateId = validate($id);

    $query = "SELECT * FROM $validateTable WHERE id = '$validateId' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 200,
                'message' => "Successfully fetched",
                'data' => $row
            ];
            return $response;
        } else {

            $response = [
                'status' => 500,
                'error' => mysqli_error($connection),
            ];
            return $response;
        }
    } else {
        $response = [
            'status' => 500,
            'error' => mysqli_error($connection),
        ];
        return $response;
    }
}

function deleteFn($userId, $tableName)
{
    global $connection;
    $table = validate($tableName);
    $id = validate($userId);

    // Mise à jour de la colonne deleted à 1 pour marquer l'entrée comme "supprimée"
    $query = "UPDATE $table SET deleted = 1 WHERE id = '$id'";
    
    // Execute query
    $deleteResponse = mysqli_query($connection, $query);
    return $deleteResponse;
}

function logoutSession()
{
    unset($_SESSION['auth']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
}

function siteConfig($column)
{
    $setting = getDataById(1, 'settings');
    if ($setting['status'] == 200) {
        return $setting['data'][$column];
    }
}


function socialMedia($column)
{
    $sm = getDataById(1, "social_medias");
    if ($sm['status'] == 200) {
        return $sm['data'][$column];
    }
}

function getClientData($data)
{
    global $connection;
    $table = validate($data);

    // Get all users from the database and store them in an array
    $query = "SELECT id, nom, prenom FROM $table";

    $result = mysqli_query($connection, $query);
    return $result;
}

function getClientDataById($tableName, $client_id)
{
    global $connection;

    $query = "SELECT * FROM $tableName WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $client_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $clientData = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $clientData;
    } else {

        return false;
    }
}

function getClientName($client_id)
{
    $clientData = getClientDataById('clients', $client_id);

    if ($clientData) {
        return $clientData['nom'] . ' ' . $clientData['prenom'];
    } else {
        return 'Client inconnu';
    }
}

function getToolsName($tableName)
{
    global $connection;

    $query = "SELECT id, title FROM $tableName";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $tools = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $tools;
    } else {
        return false;
    }
}

function getToolTitle($reparationId)
{
    $tools = getToolsName('reparations');
    foreach ($tools as $tool) {
        if ($tool['id'] == $reparationId) {
            return $tool['id'];
        }
    }
    return "Titre non trouvé";
}

// ------------------------------ END BACKEND SIDE ---------------------------- //

function getServicesData($data)
{
    global $connection;
    $table = validate($data);

    // Get all users from the database and store them in an array
    $query = "SELECT * FROM $table WHERE deleted = 0 AND status = 'visible' ORDER BY updated_at DESC";
    $result = mysqli_query($connection, $query);

    // Vérifiez si la requête a échoué
    if (!$result) {
        echo "Erreur MySQL : " . mysqli_error($connection);
    }
    return $result;
}

function formatDate($dateString) {
    // Convertir la chaîne de date en objet DateTime
    $date = new DateTime($dateString);

    // Formater la date selon le style "Lundi le 09 Déc 2023"
    $formattedDate = $date->format("l d M Y");

    return $formattedDate;
}