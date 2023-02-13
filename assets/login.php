<?php
    session_start();
    require_once 'function.php';
       
    if ($_SESSION['auth']) {
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
    <body class="form main">
        <form action="signin.php" method="post">
            <Label>Логин</Label>
            <input name="login" type="text" placeholder="Введите свой логин">
            <label>Пароль</label>
            <input name="password" type="password" placeholder="Введите пароль">
            <input class="button" name="submit" type="submit" value="Войти">
            <p>
                У вас нет аккаунта? - <a class="res" href="register.php">Зарегестрируйтесь</a>!
            </p>
            <?php 
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';                    
                }                
                unset($_SESSION['message']);
            ?>
       </form>
    </body>
</html>