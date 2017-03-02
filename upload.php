<?php
session_start();
require 'functions.php';
$uploadDir="C:/xampp/htdocs/FS/users/. $login";
if ($_FILES["filename"]["size"] > 1024 * 3 * 1024) {
    echo("Размер файла превышает три мегабайта");
    exit;
}
if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
    move_uploaded_file($_FILES["filename"]["tmp_name"], $uploadDir . $_FILES["filename"]["name"]);
    echo("Файл успешно загружен");
} else {
    echo("Ошибка загрузки файла");
}
?>