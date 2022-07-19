<?php
    session_start();
    $_SESSION = array();
    $userLogin = $_SESSION['login'];
    setcookie("login",$userLogin, time() - 1000, "/");
D:\OpenServer\OpenServer\domains\basic\lesson4
lesson4
    unset($_SESSION['admin']);
    unset($_SESSION['status']);
    unset($_SESSION['login']);X
    unset($_SESSION['pass']);
    unset($_SESSION['userID']);
    session_destroy();

    header("Location: /engine/index.php");
    session_write_close();