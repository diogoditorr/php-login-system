<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $usernameId = $_POST['username_id'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password_repeat'];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (emptyInputSignup([$name, $email, $usernameId, $password, $passwordRepeat]) !== false) {
        header('location: ../signup.php?error=emptyInput');
        exit();
    }

    if (invalidUsernameId($usernameId) !== false) {
        header('location: ../signup.php?error=invalidUsernameId');
        exit();
    }

    if (invalidEmail($email) !== false) {
        header('location: ../signup.php?error=invalidEmail');
        exit();
    }

    if (passwordMatch($password, $passwordRepeat) !== true) {
        header('location: ../signup.php?error=passwordsNoMatch');
        exit();
    }

    if (usernameIdExists($connection, $usernameId, $email) !== false) {
        header('location: ../signup.php?error=usernameIdTaken');
        exit();
    }

    createUser($connection, compact('name', 'email', 'usernameId', 'password'));

} else {
    header('location: ../signup.php');
    exit(); // Stop script
}