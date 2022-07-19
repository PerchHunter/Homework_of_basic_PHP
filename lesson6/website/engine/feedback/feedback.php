<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отзывы о нас</title>

    <link rel="icon" href="../../public/favicongallery.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/commonStyles.css">
    <link rel="stylesheet" href="../../public/css/feedback.css">

</head>
<body>
    <div class="headerBackground">
        <a href="../index.php" class="comeBackLink">
            <button  class="comeBackButton" >Вернуться на главную</button>
        </a>

        <div class="container">
            <header class="header">
                <h1>Отзывы о нас</h1>
            </header>
        </div>
    </div>


    <div class="container">
        <main>
            <div class="class="reviewsWrap"">
                <?php
                include_once("getFeedback.php");
                ?>
            </div>
            <hr>
            <form id="setFeedbackForm" action="setFeedback.php" method="post" enctype="multipart/form-data">
                <p>Оставьте свой отзыв. Имя указывать не обязательно, если хотите остаться анонимным.</p>
                <p><textarea rows="10" cols="45" name="textFeedback" placeholder="Напишите что думаете о нас" autofocus required
                    ></textarea></p>
                <p><input type="text" name="username" placeholder="Ваше имя"/></p>
                <p>Проверим что вы не бот. Введите предпоследнее по величине число из предложенных.</p>
                <div class="capchaWrap">
                <?php
                    include_once("../../config/capcha.php");
                ?>
                </div>
                <input type="hidden" name="trueanswer" value="<?=$capcha[3]?>" >
                <input type="text" name="useranswer" placeholder="Ваш ответ" required>
                <button type="submit" name="submitFeedback">Отправить отзыв.</button>
                <p><?=$errMessage?></p>
            </form>
        </main>
    </div>

</body>
</html>
