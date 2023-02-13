<?php

    session_start();
    require_once 'function.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $birthday = $_POST['birthday'];

    if ($password === $password_confirm) {
        
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Аватар не загрузился!';
            header('Location: register.php');
        }

        $password = md5($password);
        $newUser = [$login => ['password' => $password, 'birthday' => $birthday, 'avatar' => $path, 'timereg' => time()]];
        addUserToList($newUser);
        $_SESSION['message'] = 'Вы зарегестрировались!';
        header('Location: login.php');

    } else {
        $_SESSION['message'] = 'пароли не совпадают!';
        header('Location: register.php');
    }

?>
   
