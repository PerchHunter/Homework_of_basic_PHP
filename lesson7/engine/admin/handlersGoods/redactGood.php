<?php
    include_once("../../../config/func.php");

    $name = $_POST['titleGood'];
    $description = $_POST['descriptionGood'];
    $price = $_POST['priceGood'];
    $nameFile = str_replace(' ', '_', $_FILES['photoGood']['name']);
    $path = "../".GOODS_BIG . $nameFile;
    $pathSmall = "../".GOODS_SMALL . $nameFile;


    /**
     * если в форме изменения товара залили фото, то удаляем старое фото товара из папок,
     * а далее вызываем функцию. Выполняем операции такие же как при добавлении товара.
     * Сделал чтобы уменьшить количество вложенностей if и while
     * @param $connectdb - подключение к БД, имя товара, его описсание, цена, назв. файла, путь к больш. изобр.,
     *путь к мал. изобр., id товара
     */
    function addGood( $connectdb, $namef, $descriptionf, $pricef, $nameFilef, $pathf, $pathSmallf, $idf) {
        if ($_FILES['photoGood']['error']) {
            $message = "Ошибка загрузки файла. " . $_FILES['photoGood']['error'];
        } elseif ($_FILES['photoGood']['size'] > 5242880) {
            $message = 'Ошибка загрузки файла. Размер файла не должен превышать 5 Мб.';
        } elseif (
            $_FILES['photoGood']['type'] == 'image/jpeg' ||
            $_FILES['photoGood']['type'] == 'image/png' ||
            $_FILES['photoGood']['type'] == 'image/gif'
        ) {
            //перемещаем загруженный файл в папку photoGoods
            if (copy($_FILES['photoGood']['tmp_name'], $pathf)) {
                $type = explode('/', $_FILES['photoGood']['type'])[1];
                changeImage(160, 210, $_FILES['photoGood']['tmp_name'], $pathSmallf, $type);
                //добавляем запись в БД
                $redactGoodSQL = "UPDATE goods SET name = '$namef', description = '$descriptionf', price = {$pricef}, path = '$nameFilef' WHERE id = {$idf}";
                $redactGoodQuery = mysqli_query($connectdb, $redactGoodSQL);
                $message = $redactGoodQuery ? 'Товар успешно изменён' : 'Ошибка запроса к базе данных';
            } else {
                $message = 'Ошибка загрузки файла.';
            }
        } else {
            $message = 'Такой тип файла не поддерживается. Загрузите jpeg -, png - или gif - файл.';
        }

        return $message;
    }


    $redactGoodSQL = "SELECT path FROM goods WHERE id = '$_POST[redactGoodButton]'";
    $redactGoodQuery = mysqli_query($connect, $redactGoodSQL);

    while ($redactGood = mysqli_fetch_assoc($redactGoodQuery)) {

        if ($nameFile) {
            unlink("../".GOODS_BIG . $redactGood['path']);
            unlink("../".GOODS_SMALL . $redactGood['path']);

            $checkPath = mysqli_query($connect, "SELECT id FROM goods WHERE path = '$path'");
            //проверяем путь. Если файл с таким именем уже существует, изменяем  имя
            if (mysqli_num_rows($checkPath)) {
                $nameFile = "1_" . $nameFile;
                $path = "../".GOODS_BIG . $nameFile;
            }

            $message = addGood($connect, $name, $description, $price, $nameFile, $path, $pathSmall, $_POST['redactGoodButton']);
        } else {
            $addImageSQL = "UPDATE goods SET name = '$name', description = '$description', price = '$price' WHERE id = '$_POST[redactGoodButton]'";
            $addImageQuery = mysqli_query($connect, $addImageSQL);
            $message = $addImageQuery ? 'Товар успешно изменён' : 'Ошибка запроса к базе данных';
        }
    }