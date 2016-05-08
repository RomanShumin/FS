<?php
require("functions.php");
session_start();
authenticateUser($login,$password,$db)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
<h2>Cтраница входа</h2>
<p><span class="error" </span></p>

    <form method="post">
        <label>Ваш логин:</label>
        <input type="text" name="login" value="<?php  echo $login;?>" >
        <span class="error">* <?php echo $loginErr;?></span>
        <br><br>
        <label>Ваш пароль:</label>
        <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Войти">
        <br><br>
        <a href="form.php">Зарегистироваться</a>
    </form>

<?php
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    echo "Вы вошли на сайт, как гость";
}
else
{
    echo "Вы вошли на сайт, как ".$_SESSION['login'];
}
?>
</body>
</html>