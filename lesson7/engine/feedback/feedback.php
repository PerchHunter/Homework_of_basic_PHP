<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отзывы о нас</title>

    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/feedback.css">

</head>
<body>
    <?php
        include("../../template/header.php");
    ?>


    <div class="container">
        <?php
            include_once ("../../template/authMessage.php");
        ?>
        <main>

            <div class="reviewsWrap">
                <?php
                include_once("getFeedback.php");
                ?>
            </div>

            <form id="setFeedbackForm" action="setFeedback.php" method="post" enctype="multipart/form-data">
                <h3 class="setFeedbackFormTitle">Оставьте свой отзыв!</h3>
                <p><textarea class="textFeedback" rows="10" cols="45" name="textFeedback" placeholder="Напишите что думаете о нас. Имя указывать не обязательно, если хотите остаться анонимным." autofocus required
                    ></textarea></p>
                <p><input class="usernameFeedback" type="text" name="username" placeholder="Ваше имя"/></p>
                <p >Проверим что вы не бот.<br> Введите предпоследнее по величине число из предложенных.</p>
                <div class="capchaFeedback">
                <?php
                    include_once("../../config/capcha.php");
                ?>
                </div>
                <input type="hidden" name="trueanswer" value="<?=$capcha[3]?>" >
                <input class="useranswerCapchaFeedback" type="text" name="useranswer" placeholder="Ваш ответ" required>
                <button class="submitFeedback" type="submit" name="submitFeedback">Отправить отзыв</button>
                <p class="errorAddFeedback"><?=$errMessage?></p>
            </form>
        </main>
    </div>
</body>
</html>
