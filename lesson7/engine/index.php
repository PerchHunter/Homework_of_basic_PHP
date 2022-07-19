<?php
    session_start();
//    print_r($_SESSION);
//    print_r($_COOKIE);
    include_once ("../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>

    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    <link rel="stylesheet" href="/public/css/index.css">
    <link rel="stylesheet" href="/public/css/catalog.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="headerBackground">
        <div class="container">
            <header class="header" style="justify-content: space-between">
                <figure class="figureLogo"><img src="/public/logo.png" alt="logo"><figcaption class="figcaption">Магазин фототоваров</figcaption></figure>
                <nav class="headerNavigation">
                    <?php
                    if ($_SESSION['admin']) :?>
                    <a href="/engine/admin/index.php">Админка</a>
                    <?php
                    endif;
                    ?>
                    <a href="/engine/catalog/catalog.php">Каталог</a>
                    <a href="/engine/gallery/gallery.php">Фотогалерея</a>
                    <a href="/engine/cart/cart.php">Корзина</a>
                    <a href="/engine/feedback/feedback.php">Отзывы</a>
                    <?php
                    if ($_COOKIE['login'] || $_SESSION['admin']):?>
                        <a href="/engine/personalCabinet/personalCabinet.php">Личный кабинет</a>
                        <a href="/engine/auth/logOut.php">Выйти</a>
                    <?php
                    endif;
                    ?>
                </nav>
            </header>

        </div>
    </div>

    <div class="container">

       <?php
           include_once ("../template/authMessage.php");
       ?>

       <div class="wrapper">
           <h2 class="catalogHeading">Часто просматриваемые товары</h2>

       <?php
           include_once ("catalog/goods.php");
       ?>
       </div>
    </div>
</body>
</html>
