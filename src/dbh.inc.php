<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "usbw";
$dbName = "php_login_system";

$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = `
    CREATE TABLE users (
        id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        name VARCHAR(128) NOT NULL,
        email VARCHAR(128) NOT NULL,
        username_id VARCHAR(128) NOT NULL,
        password VARCHAR(128) NOT NULL
    );
`;