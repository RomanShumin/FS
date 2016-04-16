<?php

$login= $loginErr ="";
$password= $passwordErr ="";
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
include "bd.php";
if (!empty($_POST['login']) and preg_match("/^[0-9a-zA-Z_.]{4,8}$/", $login)
    and (!empty($_POST['password']) and preg_match("/^[0-9a-zA-Z]{4,8}$/", $password))) {
    $fun='data_select';
    if (!empty($fun['id'])) {
        echo("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    } else {
        $result2 = mysqli_query($db,"INSERT INTO myusers (login,password) VALUES('$login','$password')");
        mkdir(__DIR__ . '/users/' . $login, 0600);
        echo "Регистрация успешно завершена";

    }
}
?>



