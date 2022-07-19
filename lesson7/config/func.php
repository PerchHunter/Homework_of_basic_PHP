<?php

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