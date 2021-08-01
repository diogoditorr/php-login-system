<?php

if (isset($_POST['submit'])) {
    $usernameId = $_POST['username_id'];
    $password = $_POST['password'];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (emptyInputLogin([$usernameId, $password]) !== false) {
        header('location: ../login.php?error=emptyInput');
        exit();
    }

    loginUser($connection, $usernameId, $password);
} else {
    header("location: ../login.php");
    exit();
}