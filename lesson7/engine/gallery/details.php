<?php
    session_start();
    include_once("../../config/config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Детали фото</title>
    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/details.css">
</head>
<body>
</body>

    <?php
        include_once ("../../template/header.php");
    ?>

    <div class="container">
        <?php
            include_once ("../../template/authMessage.php");
        ?>

        <?php
        if($_GET['id']):
            $getImgSQL = "SELECT name, views FROM photos WHERE id = {$_GET['id']}";
            $getImgQuery = mysqli_query($connect, $getImgSQL);
            while($data = mysqli_fetch_assoc($getImgQuery)):
            //ко всем просмотрам добавляем наш просмотр, если мы не админ
            if(!$_GET['admin']) {
                ++$data['views'];
                $viewIncrementQuery = mysqli_query($connect,"UPDATE photos SET views = '$data[views]' WHERE  id = '$_GET[id]'");
            }
        ?>

        <div class="textContent">
            <h2>Просмотров фото: <?=$data['views']?></h2>
            <a href="<?= $_SERVER['HTTP_REFERER']?>"><Button class="buttonBack"><h2>Назад</h2></Button></a>
        </div>
        <div class="bigPhoto">
            <img src="/public/images/images_big/<?=$data['name']?>" alt="photo"/>

            <?php
            endwhile;
        endif;
            ?>

        </div>
    </div>
</body>
</html>