<?php
require "bd.php";
$login= $loginErr ="";
$password= $passwordErr ="";
$verificationLogin="/^[0-9a-zA-Z_.]{4,8}$/";
$verificationPassword="/^[0-9a-zA-Z]{4,8}$/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"])) {
        $loginErr = "Введите логин";
    } else {
        $login = ($_POST["login"]);
        if (!preg_match($verificationLogin, $login)) {
            $loginErr = "Недопустимый логин";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Введите пароль";
    } else {
        $password = ($_POST["password"]);
        if (!preg_match($verificationPassword, $password)) {
            $passwordErr = "Неопустимый пароль";
        }
    }
}

function addUser($login, $password,$db) {
    if (!empty($_POST['login']) and preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login)
        and (!empty($_POST['password']) and preg_match("/^[0-9a-zA-Z]{4,8}$/", $password))) {
    $result = mysqli_query($db,"SELECT id FROM myusers WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])){
       echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
    }
    else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db,"INSERT INTO myusers (login,password) VALUES('$login','$password')");
        echo "Региcтрация успешно завершена";
        mkdir(__DIR__ . '/users/' . $login, 0600);
}}}

function authenticateUser($login,$password,$db){
    if (!empty($_POST['login']) and preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login)
        and (!empty($_POST['password']) and preg_match("/^[0-9a-zA-Z]{4,8}$/", $password))){
    $result = mysqli_query($db,"SELECT * FROM myusers WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
if (password_verify($password,$myrow['password'])) {
    $_SESSION['login'] = $myrow['login'];
    $_SESSION['id'] = $myrow['id'];
    echo "Вы успешно вошли на сайт";
}
    else {
        echo "Неверный логин или пароль";
    }
}}