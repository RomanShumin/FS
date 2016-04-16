<?php
$login = $loginErr = "";
$password = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"])) {
        $loginErr = "Введите логин";
    } else {
        $login = $_POST["login"];
        if (!preg_match("/^[0-9a-zA-Z_.]{4,8}$/",$login)) {
            $loginErr = "Недопустимый логин";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Введите пароль пароль";
    } else {
        $password = $_POST["password"];
        if (!preg_match("/^[0-9a-zA-Z]{4,8}$/",$password)) {
            $passwordErr = "Недопустимый пароль";
        }
    }
}

if (!empty($_POST['login']) and preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login)
    and (!empty($_POST['password']) and preg_match("/^[0-9a-zA-Z]{4,8}$/", $password))) {
    require "bd.php";
    $fun='data_select';
    if (empty($fun['password'])) {
        echo("Извините, введённый вами login или пароль неверный.");
    } else {
        if ($fun['password'] == $password) {
            $_SESSION['login'] = $fun['login'];
            $_SESSION['id'] = $fun['id'];
            echo "Вы успешно вошли на сайт!";
        } else {
            echo("Извините, введённый вами login или пароль неверный.");
        }
    }
}
