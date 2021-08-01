<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <!-- Css's -->
    <?php 
        foreach($css["locations"] as $location) {
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$location\">";
        };
    ?>

    <title><?= $title ?? 'Document' ?></title>
</head>
<body>
    
