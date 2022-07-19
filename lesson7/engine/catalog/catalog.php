<?php
    session_start();
    include_once ("../../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каталог</title>

    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/index.css">
    <link rel="stylesheet" href="/public/css/catalog.css">

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
        <div class="wrapper">
            <h2 class="catalogHeading">Наш каталог товаров</h2>

            <?php
            include_once ("goods.php");
            ?>

        </div>
    </div>
    <script src="/public/js/ajax.js"></script>
</body>
</html>
