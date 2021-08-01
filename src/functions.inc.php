<?php

function anyEmptyElement(array $elements) {
    $empty = false;

    foreach ($elements as $element) {
        if (empty($element)) {
            $empty = true;
            break;
        }
    }

    return $empty;
}

function emptyInputSignup(array $list) {
    return anyEmptyElement($list);
}

function emptyInputLogin(array $list) {
    return anyEmptyElement($list);
}

function invalidUsernameId($usernameId) {
    return !preg_match("/^[a-zA-Z0-9]*$/", $usernameId) ? true : false;
}

function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}

function passwordMatch($password, $passwordRepeat) {
    return $password === $passwordRepeat ? true : false;
}

function getUser($connection, string $usernameId = null, string $email = null) {
    if ($usernameId == null && $email == null) {
        return null;
    }

    $sqlStatement = "SELECT * FROM users WHERE username_id = ? OR email = ?;";

    $stmt = mysqli_stmt_init(($connection));
    if (!mysqli_stmt_prepare($stmt, $sqlStatement)) {
        header('location: ../signup.php?error=stmtFailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $usernameId, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);

    mysqli_stmt_close($stmt);

    if ($row) {
        return $row;
    } else {
        return null;
    }
}

function usernameIdExists($connection, $usernameId, $email) {
    return getUser($connection, $usernameId, $email) ? true : false;
}

function createUser($connection, array $data) {
    if (anyEmptyElement($data)) {
        return;
    }

    $sqlStatement = "INSERT INTO users (name, email, username_id, password) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init(($connection));
    if (!mysqli_stmt_prepare($stmt, $sqlStatement)) {
        header('location: ../signup.php?error=stmtFailed');
        exit();
    }

    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $data['name'], $data['email'], $data['usernameId'], $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('location: ../signup.php?error=none');
}

function loginUser($connection, $usernameOrEmail, $password) {
    if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
        $user = getUser($connection, null, $usernameOrEmail);
    } else {
        $user = getUser($connection, $usernameOrEmail, null);
    }

    if ($user == null) {
        header('location: ../login.php?error=wrongLogin');
        exit();
    }

    $passwordHashed = $user['password'];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header('location: ../login.php?error=wrongLogin');
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username_id'] = $user['username_id'];

        header('location: ../index.php');
        exit();
    }
}