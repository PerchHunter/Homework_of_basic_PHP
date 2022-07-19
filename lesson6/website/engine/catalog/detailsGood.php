<?php
    include_once("../../config/config.php");
    global $connect;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Детали товара</title>

    <link rel="icon" href="../../public/favicongallery.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/commonStyles.css">
    <link rel="stylesheet" href="../../public/css/detailsGood.css">

</head>
<body>
    <div class="headerBackground">
        <div class="container">
            <header class="header">
                <h1>О товаре</h1>
            </header>
        </div>
    </div>
<div class="container">

    <?php
    if($_GET['id']):
    $getGoodSQL = "SELECT * FROM goods WHERE id = {$_GET['id']}";
    $getGoodQuery = mysqli_query($connect, $getGoodSQL);

    while($data = mysqli_fetch_assoc($getGoodQuery)):
    //ко всем просмотрам добавляем наш просмотр
    ++$data['views'];
    ?>

    <div class="textContent">
        <h2>Просмотров этого товара: <?=$data['views']?></h2>
        <a href="<?= $_SERVER['HTTP_REFERER']?>"><Button class="buttonBack"><h2>Вернуться к каталогу</h2></Button></a>
    </div>
    <div class="detailsGoodWrap">
        <div class="erlangedGoodCard">
            <img src="<?=GOODS_BIG.$data['path']?>" alt="photo"/>
            <div class="goodInfo">
                <span class="goodArticul">Артикул товара: <span><?=$data['id']?></span></span>
                <h3 class="goodName"><?=$data['name']?></h3>
                <p class="goodDescription"><?=$data['description']?></p>
                <p class="goodPrice">Цена: &#8381; <span><?=$data['price']?></span></p>
            </div>

        </div>


        <?php
        $viewIncrementQuery = mysqli_query($connect,"UPDATE goods SET views = '$data[views]' WHERE  id = '$_GET[id]'");
        endwhile;
        endif;
        ?>

    </div>
</div>
</body>
</html>