<?php
include_once ("../config/config.php");
    global $connect;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>

    <link rel="icon" href="../public/favicongallery.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/commonStyles.css">
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/catalog.css">

</head>
<body>
    <div class="headerBackground">
        <div class="container">
            <header class="header">
                <figure class="figureLogo"><img src="../public/logo.png" alt="logo"><figcaption class="figcaption">Магазин фототоваров</figcaption></figure>
                <nav class="headerNavigation">
                    <a href="gallery/gallery.php">Фотогалерея</a>
                    <a href="feedback/feedback.php">Отзывы о нас</a>
                </nav>
            </header>

        </div>
    </div>


    <div class="container">
       <div class="wrapper">
           <h2 class="catalogHeading">Наш топ товаров</h2>

           <?php
           include_once ("catalog/goods.php");
           ?>

       </div>


    </div>





</body>
</html>
