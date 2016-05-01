<?php
require "functions.php";
$login= $loginErr ="";
$password= $passwordErr ="";
//$verificationLogin=preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login);
//$verificationPassword=preg_match("/^[0-9a-zA-Z]{4,8}$/", $password);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"])) {
        $loginErr = "Введите логин";
    } else {
        $login = ($_POST["login"]);
        if (!preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login)) {
            $loginErr = "Недопустимый логин";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Введите пароль";
    } else {
        $password = ($_POST["password"]);
        if (!preg_match("/^[0-9a-zA-Z]{4,8}$/", $password)) {
            $passwordErr = "Неопустимый пароль";
        }
    }
}
if (!empty($_POST['login']) and preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login)
    and (!empty($_POST['password']) and preg_match("/^[0-9a-zA-Z]{4,8}$/", $password))) {
    addUser($login,$password,$db);
}




