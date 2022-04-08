<?php
    include("config.php");
//    global $connect;
//    global $message;
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ лекция 5</title>

    <link rel="icon" href="../public/favicongallery.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <header class="header">
        <h1 class="heading">Фотогалерея</h1>
        <button  class="openFormButton" >Загрузите своё фото!</button>

        <div class="windowWithForm">
            <form id="setImageForm" action="handlers/addImage.php" method="post" enctype="multipart/form-data">
                <label class="label">
                    <span class="material-icons attach_icon">attach_file</span>
                    <span class="title">Добавить файл</span>
                    <input type="file" name="userfile" accept="image/*"/>
                </label>
                <button class="setImageButton" type="submit" form="setImageForm" name="setImageButton">
                    Загрузить файл
                </button>
            </form>
        </div>
    </header>

    <div class="container">
        <main>
            <div class="gallery">
                <?php
                include_once("./gallery/gallery.php");
                ?>
            </div>
<!--            <div>--><?//= $message)?><!--</div>-->
        </main>
    </div>

    <script src="../public/js/openForm.js"></script>
</body>
</html>
