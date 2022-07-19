<?php

    $name = $_POST['titleGood'];
    $description = $_POST['descriptionGood'];
    $price =  $_POST['priceGood'];
    $nameFile = str_replace(' ', '_', $_FILES['photoGood']['name']);
    $path = GOODS_BIG.$nameFile;


    $checkPath = mysqli_query($connect, "SELECT id FROM goods WHERE path = '$path'");
    //проверяем путь. Если файл с таким именем уже существует, изменяем имя
    if ($data = mysqli_fetch_assoc($checkPath)) {
        $nameFile = "1_".$nameFile;
        $path = GOODS_BIG . $nameFile;
    }

    function changeImage($h, $w, $imgFromTmp, $srcSmallImage, $type) {
        //Создание нового полноцветного изображения
        $newimg = imagecreatetruecolor($h, $w);
        switch ($type) {
            case 'jpeg':
                //Создаёт новое изображение из файла jpeg
                $img = imagecreatefromjpeg($imgFromTmp);
                //копирует прямоугольную часть одного изображения на другое изображение,
                // интерполируя значения пикселов таким образом,
                // чтобы уменьшение размера изображения не уменьшало его чёткости
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                //Выводит изображение в браузер или пишет в файл
                imagejpeg($newimg, $srcSmallImage);
                break;
            case 'png':
                $img = imagecreatefrompng($imgFromTmp);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagepng($newimg, $srcSmallImage);
                break;
            case 'gif':
                $img = imagecreatefromgif($imgFromTmp);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagegif($newimg, $srcSmallImage);
                break;
        }
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
            //перемещаем загруженный файл в папку images
            if (copy($_FILES['photoGood']['tmp_name'], GOODS_BIG.$nameFile)) {
                $pathSmallImageGood = GOODS_SMALL.$nameFile;
                $type = explode('/', $_FILES['photoGood']['type'])[1];
                changeImage(200, 300, $_FILES['photoGood']['tmp_name'], $pathSmallImageGood, $type);
                //добавляем запись в БД
//                print_r($name, $path, $size);
                $addImageSQL = "INSERT INTO goods (name, description, price, path) VALUES ('$name', '$description', '$price', '$nameFile')";
                $addImageQuery = mysqli_query($connect, $addImageSQL);
            } else {
                $message = 'Ошибка загрузки файла.';
            }
        } else {
            $message = 'Такой тип файла не поддерживается. Загрузите jpeg -, png - или gif - файл.';
        }
    }

