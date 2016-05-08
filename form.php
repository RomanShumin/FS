<?php require "functions.php"?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<h2>Страница регистрации</h2>
<?php addUser($login,$password,$db)?>
<p><span class="error" </span></p>
<form method="post">
    <label>Логин:</label>
    <input type="text" name="login" value="<?php  echo $login;?>">
    <span class="error">* <?php echo $loginErr;?></span>
    <br><br>
    <label>Пароль:</label>
    <input type="password" name="password">
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>

    <div>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </div>
    <a href="EntryPage.php">Войти</a>
</form>
</body>
</html>

