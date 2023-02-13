<?php
    session_start();
    require_once 'function.php';

    if (!$_SESSION['auth']) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/norm.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>login</title>
</head>
    <body class="main">
        <div class="acc_login">            
            <div class='acc_item'><a href="logout.php" class='exit'>Bыйти</a></div>
            <div class='acc_item'>Привет <?= getCurrentUser(); ?> !</div>
            <img class='acc_img' src='../<?= getAvatarUser(getCurrentUser()); ?>' alt="аватар">
            <div class='acc_item'><a href="../index.php" class='exit'>На главную</a></div>
        </div>         
    </body>
</html>