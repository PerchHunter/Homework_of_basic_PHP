<?php
    include_once("../../../config/config.php");

    global $PHOTO;
    global $PHOTO_SMALL;

    $name = str_replace(' ', '_', $_FILES['userfile']['name']);
    $path = PHOTO . $name;
    $pathSmallImage = PHOTO_SMALL.$name;
    $size = $_FILES['userfile']['size'];

    $checkPath = mysqli_query($connect, "SELECT id FROM photos WHERE path = '$path'");
    //проверяем путь. Если файл с таким именем уже существует, изменяем имя
    if ($data = mysqli_fetch_assoc($checkPath)) {
        $name = "1_".$name;
        $path = PHOTO . $name;
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

    if (isset($_POST['setImageButton'])) {
        if ($_FILES['userfile']['error']) {
            $message = "Ошибка загрузки файла. ".$_FILES['userfile']['error'];
        } elseif ($_FILES['userfile']['size'] > 5242880) {
            $message = 'Ошибка загрузки файла. Размер файла не должен превышать 5 Мб.';
        } elseif (
            $_FILES['userfile']['type'] == 'image/jpeg'||
            $_FILES['userfile']['type'] == 'image/png' ||
            $_FILES['userfile']['type'] == 'image/gif'
        ) {
            //перемещаем загруженный файл в папку images
            if (copy($_FILES['userfile']['tmp_name'], PHOTO.$name)) {
                $type = explode('/', $_FILES['userfile']['type'])[1];
                changeImage(250, 350, $_FILES['userfile']['tmp_name'], $pathSmallImage, $type);
                //добавляем запись в БД
                $queryAddImage = "INSERT INTO photos (name, path, size) VALUES ('$name', '$path', '$size')";
                $addImageInDB = mysqli_query($connect, $queryAddImage);
            } else {
                $message = 'Ошибка загрузки файла.';
            }
        } else {
            $message = 'Такой тип файла не поддерживается. Загрузите jpeg -, png - или gif - файл.';
        }
    }

    header("Location: ../index.php?param=galleryAdmin");