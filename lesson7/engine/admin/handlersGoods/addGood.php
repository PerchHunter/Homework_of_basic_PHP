<?php

    $name = $_POST['titleGood'];
    $description = $_POST['descriptionGood'];
    $price =  $_POST['priceGood'];
    $nameFile = str_replace(' ', '_', $_FILES['photoGood']['name']);
    $path = GOODS_BIG.$nameFile;
    $pathSmall = GOODS_SMALL.$nameFile;

    $checkPath = mysqli_query($connect, "SELECT id FROM goods WHERE path = '$path'");
    //проверяем путь. Если файл с таким именем уже существует, изменяем имя
    if ($data = mysqli_fetch_assoc($checkPath)) {
        $nameFile = "1_".$nameFile;
        $path = GOODS_BIG . $nameFile;
    }



    if (isset($_POST['addGoodButton'])) {
        if ($_FILES['photoGood']['error']) {
            $message = "Ошибка загрузки файла. ".$_FILES['photoGood']['error'];
        } elseif ($_FILES['photoGood']['size'] > 5242880) {
            $message = 'Ошибка загрузки файла. Размер файла не должен превышать 5 Мб.';
        } elseif (
            $_FILES['photoGood']['type'] == 'image/jpeg'||
            $_FILES['photoGood']['type'] == 'image/png' ||
            $_FILES['photoGood']['type'] == 'image/gif'
        ) {
            //перемещаем загруженный файл в папку photoGoods
            if (copy($_FILES['photoGood']['tmp_name'], GOODS_BIG.$nameFile)) {
                $type = explode('/', $_FILES['photoGood']['type'])[1];
                changeImage(150, 200, $_FILES['photoGood']['tmp_name'], $pathSmall, $type);
                //добавляем запись в БД
                $addImageSQL = "INSERT INTO goods (name, description, price, path) VALUES ('$name', '$description', '$price', '$nameFile')";
                $addImageQuery = mysqli_query($connect, $addImageSQL);
            } else {
                $message = 'Ошибка загрузки файла.';
            }
        } else {
            $message = 'Такой тип файла не поддерживается. Загрузите jpeg -, png - или gif - файл.';
        }
    }

