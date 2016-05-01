<?php
require "bd.php";
function addUser($login, $password,$db) {
    $result = mysqli_query($db,"SELECT id FROM myusers WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])){
       echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
    }
    else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db,"INSERT INTO myusers (login,password) VALUES('$login','$password')");
        echo "Региcтрация успешно завершена";
}}

function authenticateUser($login,$password,$db){
    $result = mysqli_query($db,"SELECT * FROM myusers WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
if (password_verify($password,$myrow['password'])) {
    $_SESSION['login'] = $myrow['login'];
    $_SESSION['id'] = $myrow['id'];
}}