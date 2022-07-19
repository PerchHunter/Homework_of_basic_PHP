<?php
session_start();
    $login = $_SESSION['login'];
    include_once ("../../config/config.php");

    print_r($_COOKIE);
    print_r($_SESSION);

    $currentUserSQL = "SELECT * FROM users WHERE login = '$login'";
    $currentUserQuery = mysqli_query($connect, $currentUserSQL);
    $currentUser = mysqli_fetch_assoc($currentUserQuery);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Личный кабинет</title>

        <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
        <link rel="stylesheet" href="/public/css/header.css">
        <link rel="stylesheet" href="/public/css/commonStyles.css">
        <link rel="stylesheet" href="/public/css/index.css">
        <link rel="stylesheet" href="/public/css/popupPersonalCabinet.css">

    </head>
    <body>
    <?php
    include("../../template/header.php");
    ?>


    <div class="container">
        <div class="personalInfoWrapper">
            <h4 class="infoChangeMessage">Здравствуйте, <?=$login?>! Измените информацию о себе или укажите дополнительную.</h4>

            <p>
                <label for="username">Ваше имя:</label><input type="text" id="username" name="username" required value="<?=$currentUser['name']?>"><br>
                <label for="usersurname">Ваша фамилия:</label><input type="text" id="usersurname" name="usersurname" value="<?=$currentUser['surname']?>"><br>
                <label for="useremail">Email:</label><input type="email" id="useremail" name="useremail" value="<?=$currentUser['email']?>">
            </p>
            <button onclick="changeInfo()" name="changeInfoBtn">Изменить информацию</button>
        </div>


    </div>
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script defer>
                function changeInfo(){
                    let name = $('#username').val();
                    let surname = $('#usersurname').val();
                    let email = $('#useremail').val();
                    let str = 'name='+name+'&surname='+surname+'&email='+email;
                    $.ajax({
                        type: "POST",
                        url: "changeInfo.php",
                        data: str,
                        success: function(answer){
                            $('.infoChangeMessage').text(answer);

                        }
                    });
                }
            </script>
    </body>
    </html>

