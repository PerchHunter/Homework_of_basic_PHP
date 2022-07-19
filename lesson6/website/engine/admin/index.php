<?php
    include_once("../../config/config.php");

    global $GOODS_BIG;
    global $GOODS_SMALL;
    global $connect;

    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>

    <link rel="icon" href="../../public/favicongallery.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/commonStyles.css">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="../../public/css/catalog.css">

</head>
<body>
<div class="headerBackground">
    <a href="../index.php" class="comeBackLink">
        <button  class="comeBackButton" >Вернуться на главную</button>
    </a>

    <div class="container">
        <header class="header">
            <nav class="headerNavigation">
                <a href="?param=catalog">Каталог</a>
                <a href="?param=photo">Фотогалерея</a>
                <a href="?param=feedback">Отзывы</a>
            </nav>
        </header>
    </div>
</div>

    <div class="container">
        <?php
            if ($_GET['param'] == 'catalog') {
                include_once ("handlersGoods/addGood.php");
                include_once("../catalog/goods.php");
            } elseif ($_GET['param'] == 'photo') {
                echo "Возможно тут скоро что-то будет :)";
            } elseif ($_GET['param'] == 'feedback') {
                echo "Возможно тут скоро что-то будет :)";
            }

        ?>

    </div>
</body>
</html>
