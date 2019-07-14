<?php

$dsn = 'mysql:host=remotemysql.com:3306;dbname=rkCcRHD1jA';
$username = 'rkCcRHD1jA';
$password = 'lJUfR1fLwW';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include '../errors/db_error_connect.php';
    exit;
}

function display_db_error($error_message) {
    global $app_path;
    include '../errors/db_error.php';
    exit;
}

?>