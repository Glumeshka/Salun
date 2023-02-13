<?php

// getUsersList() возвращает массив всех пользователей и хэшей их паролей +

function getUsersList()
{
    $usersList = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    return $usersList;
}

// existsUser($login) проверяет, существует ли пользователь с указанным логином +

function existsUser($login): bool
{
    $usersList = getUsersList();
    if (array_key_exists($login, $usersList)) {
        return true;
    }
    return false;    
}

// checkPassword($login, $password) пусть возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false +

function checkPassword($login, $password): bool
{
    $usersList = getUsersList();    
    if (existsUser($login)) {
        $curUser = $usersList[$login];
        if ($curUser['password'] === $password) {
            return true;
        }
    }
    return false;    
}

// getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null. +

function getCurrentUser()
{
    $loginFromSession = $_SESSION['login'];
    $passwordFromSession = $_SESSION['password'];
    if (checkPassword($loginFromSession, $passwordFromSession)) {
        return $loginFromSession;
    }
    return null;
}

// функция для добавления новых пользователей +

function addUserToList($newUser)
{
    $usersList = getUsersList();
    $usersList += $newUser;  
    $usersListJSON = json_encode($usersList);
    return file_put_contents(__DIR__ . '/users.json', $usersListJSON, LOCK_EX);
}

// ловим путь к загруженной картинке данного пользователя

function getAvatarUser($login)
{
    $usersList = getUsersList();    
    if (existsUser($login)) {
        $curUser = $usersList[$login];
        return $curUser['avatar'];
    }

}

// ловим время регистрации данного юзера

function getTimeregUser($login)
{
    $usersList = getUsersList();    
    if (existsUser($login)) {
        $curUser = $usersList[$login];
        return $curUser['timereg'];
    }

}

// функция для определения даты ДР без года 

function getUserBithdayDate($login)
{
    $usersList = getUsersList();
    if (existsUser($login)) {
        $curUser = $usersList[$login];
        return substr($curUser['birthday'], -5);
    }
}

// функция для понимания ДР или не ДР

function checkBithday($birthday): bool
{
    if (substr(date('Y-m-d'), -5) === $birthday) {
        return true;
    }
    return false;
}

// функция сравнения остатка дня выставления на переменной в счетчик

function daysBeforeBithday($birthday)
{
    $nextBithday = date('Y') . '-' . $birthday;
    if (strtotime(date($nextBithday)) > strtotime(date('Y-m-d'))) {
        return $nextBithday = date('Y') . '-' . $birthday;
    } else {
        return $nextBithday = date('Y', strtotime('+1 year')) . "-" . $birthday;
    }    
}