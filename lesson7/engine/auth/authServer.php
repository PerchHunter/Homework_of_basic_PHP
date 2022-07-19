<?php
    //не реализован функционал перемещения товара в корзине.
// Если мы неавторизованные добавляли товар в корзину, нам давался временный id и сохранялась кука.
// Если после этих действий мы авторизуемся, кука не удалится и товар в корзине и БД не переместится от временного id к нашему

//также не реализовано: кука с временным id живёт неделю. В БД в корзине есть записи с этим id.
// После  смерти куки товар сам не удалится из БД

    function signUp($connectDB, $userName, $userLogin, $userPass) {
        $getUserIDSQL = "SELECT id FROM users WHERE login = '$userLogin'";
        $getUserIDQuery = mysqli_query($connectDB,$getUserIDSQL) or die("Error: ".mysqli_error($connectDB));

        if(mysqli_num_rows($getUserIDQuery)){
            return "Пользователь с таким логином уже существует!";
        } else {
            $addUserIDSQL = "INSERT INTO users (login, password, name) VALUES ('$userLogin', '$userPass', '$userName')";
            $addUserIDQuery = mysqli_query($connectDB,$addUserIDSQL) or die("Error: ".mysqli_error($connectDB));

            if ($addUserIDQuery) {
                $_SESSION['signUp'] = "success";

                header("Location: auth.php?signIn=true");
                session_write_close();
            }

        }
    }

    function signIn($connectDB, $userLogin, $userPass, $userRemember) {
        $getUserIDSQL = "SELECT id, status FROM users WHERE login = '$userLogin' AND password = '$userPass'";
        $getUserIDQuery = mysqli_query($connectDB,$getUserIDSQL) or die("Error: ".mysqli_error($connectDB));

        if($user = mysqli_fetch_assoc($getUserIDQuery)) {

            if ($user['status'] == 1) {
                $_SESSION['admin'] = $userLogin;
                $_SESSION['status'] = $user['status'];

                header("Location: /engine/admin/index.php");
                session_write_close();
            } else {
                $_SESSION['login'] = $userLogin;
//                $_SESSION['pass'] = $userPass;
//                $_SESSION['status'] = $user['status'];
                $_SESSION['userID'] = $user['id'];

                if ($userRemember) {
                    setcookie("login",$userLogin, time() + 3600 * 24 * 7, "/");
                } else {
                    setcookie("login",$userLogin, "", "/");
                }

                header("Location: /engine/personalCabinet/personalCabinet.php");
                session_write_close();
            }

        } else {
            return "Ошибка авторизации! Проверьте логин или пароль.";
        }
    }

    $action = $_POST['authBtn'];
    $salt = '^n&nEN=j*eEcwv9OjV`/';
    $name = $_POST['username'] ? strip_tags($_POST['username']) : null;
    $login = $_POST['userlogin'] ? strip_tags($_POST['userlogin']) : null;
    $pass = $_POST['userpassword'] ? md5($salt . strip_tags($_POST['userpassword'])) : null;
    $remember = $_POST['remember'];

    if ($action == 'signUp') {
        $message = signUp($connect, $name, $login, $pass);
    } elseif ($action == 'signIn') {
        $message = signIn($connect, $login, $pass, $remember);
    }
