<?php
try {
    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "users");
} catch (Exception $db){
    echo $e->getMessage();
}

function data_select($result, $myrow, $login, $db){
     $result = mysqli_query($db,"SELECT id FROM myusers WHERE login='$login'");
     $myrow = mysqli_fetch_array($result);

}