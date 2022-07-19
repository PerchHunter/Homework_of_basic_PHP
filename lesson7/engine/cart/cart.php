<?php
    session_start();
    $login = $_SESSION['login'];

    include_once("../../config/config.php");
    print_r($_COOKIE);
//    print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/cart.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <?php
            include_once ("getGoodsFromCart.php");
            ?>
        </main>
    </div>

    <script src="/public/js/ajax.js"></script>
</body>
</html>