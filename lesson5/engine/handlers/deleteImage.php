<?php
    include_once("../config.php");

    if (isset($_POST['deleteImageButton'])) {
        $idPhoto = $_POST['deleteImageButton'];
        $getNameImageSQL = "SELECT name FROM photos WHERE id = '$idPhoto'";
        $getNameImageQuery = mysqli_query($connect, $getNameImageSQL);



        // если нашли в БД фото с таким id, далее удаляем его
        if ($data = mysqli_fetch_assoc($getNameImageQuery)) {
            $bigImage = unlink(PHOTO.$data['name']);
            $smallImage = unlink(PHOTO_SMALL.$data['name']);

            //если большое и маленькое изображения успешно удалились из папок, удаляем запись в БД
            if ($bigImage && $smallImage) {
                $deleteImageSQL = "DELETE FROM photos WHERE id = '$idPhoto'";
                $deleteImageQuery = mysqli_query($connect, $deleteImageSQL);
            }
        }
    }

    header("Location: $_SERVER[HTTP_REFERER]");