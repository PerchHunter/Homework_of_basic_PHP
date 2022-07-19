<?php
session_start();
//если мы уже авторизовались и кто-то пробует зайти на эту страницу, редиректим его на главную
if ($_COOKIE['login'] || $_SESSION['login']) {
    session_write_close();
    header("Location: /engine/index.php");
}

include_once("../../config/config.php");
include_once("authServer.php");
print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    < link rel="stylesheet" href="/public/css/index.css">

</head>
<body>
<?php
include("../../template/header.php");
?>

<div class="container">
    <h3><?= $message ?></h3>

    <?php
    if ($_GET['signUp'] && !$_SESSION['signUp']) :?>
        <h4>Регистрация</h4>

        <form action="" method="post">
            <p>
                <label for="username">Ваше имя:</label><input type="text" id="username" name="username" required><br>
                <label for="userlogin">Ваш логин:</label><input type="text" id="userlogin" name="userlogin"
                                                                required><br>
                <label for="userpassword">Пароль:</label><input type="password" id="userpassword" name="userpassword"
                                                                required>
            </p>
            <button type="submit" name="authBtn" value="signUp">Зарегистрироваться</button>
        </form>

    <?php

    elseif ($_GET['signIn']) :

        if ($_SESSION['signUp']) :?>
            <h4>Вы успешно зарегистрировались. Войдите!</h4>
        <?php
        else :?>
            <h4>Вход в систему</h4>
        <?php
        endif;
        ?>

        <form action="" method="post">
            <p>
                <label for="userlogin">Ваш логин:</label><input type="text" id="userlogin" name="userlogin"
                                                                required><br>
                <label for="userpassword">Пароль:</label><input type="password" id="userpassword" name="userpassword"
                                                                required><br>
                <input type="checkbox" id="remember" name="remember" value="check"><label
                        for="remember">Запомнить</label>
            </p>

            <button type="submit" name="authBtn" value="signIn">Войти</button>
        </form>
    <?php
    endif;
    ?>

</div>
</body>
</html>
