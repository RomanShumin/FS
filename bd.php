<?php
try {
    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "users");
} catch (Exception $db) {
    echo $e->getMessage();
}
