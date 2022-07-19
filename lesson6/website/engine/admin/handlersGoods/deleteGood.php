<?php
    include_once ("../../../config/config.php");

    if ($_GET['deleteGood']) {
        $idGood = $_GET['deleteGood'];
        $searchGoodSQL = "SELECT * FROM goods WHERE id = '$idGood'";
        $searchGoodQuery = mysqli_query($connect, $searchGoodSQL);



        // если нашли в БД товар с таким id, далее удаляем его
        if ($data = mysqli_fetch_assoc($searchGoodQuery)) {
            $bigImage = unlink('../'.GOODS_BIG.$data['path']);
            $smallImage = unlink('../'.GOODS_SMALL.$data['path']);

            //если большое и маленькое изображения успешно удалились из папок, удаляем запись в БД
            if ($bigImage && $smallImage) {
                $deleteGoodSQL = "DELETE FROM goods WHERE id = '$idGood'";
                $deleteImageQuery = mysqli_query($connect, $deleteGoodSQL);
            }
        }
    }

    header("Location: $_SERVER[HTTP_REFERER]");