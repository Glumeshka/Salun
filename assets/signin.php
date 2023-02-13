<?php
    session_start();
      
    require_once 'function.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);
        
    if (checkPassword($login, $password) === true) {
        $_SESSION['auth'] = true;  
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('Location: account.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: login.php');
    }

$auth = $_SESSION['auth'] ?? null;


