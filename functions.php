<?php
require "bd.php";
function addUser($login, $password,$db) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result2 = mysqli_query($db,"INSERT INTO myusers (login,password) VALUES('$login','$password')");
}

function authenticateUser($login,$password,$db){
    $result = mysqli_query($db,"SELECT * FROM myusers WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
if (password_verify($password,$myrow['password'])) {
    $_SESSION['login'] = $myrow['login'];
    $_SESSION['id'] = $myrow['id'];
}}