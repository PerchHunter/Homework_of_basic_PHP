<?php
    session_start();
    include_once ("../../config/config.php");

    $login = $_SESSION['login'];
    $name = $_POST['name'] ? strip_tags($_POST['name']) : "";
    $surname = $_POST['surname'] ? strip_tags($_POST['surname']) : "";
    $email = $_POST['email'] ? strip_tags($_POST['email']) : "";

    $getUserSQL = "SELECT * FROM users WHERE login = '$login'";
    $getUserQuery = mysqli_query($connect, $getUserSQL);

    $changeInfoSQL = "UPDATE users SET name = '$name', surname = '$surname', email = '$email' WHERE login = '$login'";
    $changeInfoQuery = mysqli_query($connect, $changeInfoSQL);

    if ($getUserQuery && $changeInfoQuery) {
        $message = "Ваши данные успешно изменены";
    } else {
        $message = "Ошибка! Что - то пошло не так :(";
    }
    echo $message;