<?php
    session_start();

    if (!$_SESSION['admin']) header("Location: ../auth/auth.php?signIn=true");

    include_once("../../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>

    <link rel="icon" href="/public/favicongallery.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/commonStyles.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel="stylesheet" href="/public/css/catalog.css">
    <link rel="stylesheet" href="/public/css/gallery.css">

</head>
<body>
    <?php
    include_once("../../template/headerAdmin.php");
    ?>

    <div class="container">
        <?php
            if ($_GET['param'] == 'catalogAdmin') {
                include_once("../../config/func.php");
                include_once ("handlersGoods/addGood.php");
                include_once("../catalog/goods.php");
            } elseif ($_GET['param'] == 'galleryAdmin') {
                include_once("handlersGallery/galleryAdmin.php");
            } elseif ($_GET['param'] == 'feedbackAdmin') {
                echo "Возможно тут скоро что-то будет :)";
            }
        ?>
    </div>

    <script src="/public/js/openForm.js"></script>
</body>
</html>
