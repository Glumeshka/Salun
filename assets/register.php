<?php
    session_start();
    
    if ($_SESSION['auth']) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/norm.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>register</title>
</head>
    <body class="form main">
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <Label>Логин</Label>
            <input name="login" type="text" placeholder="Введите логин">
            <Label>Изображение профиля</Label>
            <input name="avatar" type="file" multiple>
            <label>Пароль</label>
            <input name="password" type="password" placeholder="Введите пароль">
            <label>Подтверждение пароля</label>
            <input name="password_confirm" type="password" placeholder="Подтвердите пароль">
            <label>Дата рождения</label>
            <input type="date" name="birthday" min="01-01-1950" max="<?= date('Y-m-d');?>">
            <input class="button" name="submit" type="submit" value="Зарестрироваться">
            <p>
                У вас есть аккаунт? - <a class="res" href="login.php">Авторизируйтесь</a>!
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