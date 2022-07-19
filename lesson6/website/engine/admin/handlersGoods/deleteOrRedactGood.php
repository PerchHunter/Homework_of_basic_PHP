<?php
    include_once ("../../../config/config.php");

    $_GET['deleteGood'] ? $idGood = $_GET['deleteGood'] : $idGood = $_GET['redactGood'];
    $searchGoodSQL = "SELECT * FROM goods WHERE id = '$idGood'";
    $searchGoodQuery = mysqli_query($connect, $searchGoodSQL);

    //если удаляем товар, выполняюется только этот блок
    if ($_GET['deleteGood']) {
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

        header("Location: $_SERVER[HTTP_REFERER]");
    }

    //если изменяем товар, выполняется этот блок
    if ($_GET['redactGood']) :
        include_once ("redactGood.php");

        while ($changeGood = mysqli_fetch_assoc($searchGoodQuery)) :
    ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Админка</title>

            <link rel="icon" href="../../../public/favicongallery.ico" type="image/x-icon">
            <link rel="stylesheet" href="../../../public/css/commonStyles.css">
            <link rel="stylesheet" href="../../../public/css/admin.css">
            <link rel="stylesheet" href="../../../public/css/catalog.css">

        </head>
        <body>
        <div class="headerBackground">
            <a href="../../index.php" class="comeBackLink">
                <button  class="comeBackButton" >На главную</button>
            </a>

            <div class="container">
                <header class="header">
                    <nav class="headerNavigation">
                        <a href="../index.php?param=catalogAdmin">Каталог</a>
                        <a href="../index.php?param=galleryAdmin">Фотогалерея</a>
                        <a href="../index.php?param=feedbackAdmin">Отзывы</a>
                    </nav>
                </header>
            </div>
        </div>

            <div class="container">
                <fieldset class="addGoodsFieldset">
                    <legend>Изменение товара в каталоге</legend>

                    <form class="redactGoodsForm" action="" method="post" enctype="multipart/form-data">
                        <div>
                            <p>Артикул товара (id):</p>
                            <input type="number" name="id" value="<?=$idGood?>" disabled>
                            <input type="file" name="photoGood"  placeholder="Приложить фото товара" multiple
                            >
                            <input type="text" name="titleGood" value="<?=$changeGood['name']?>" required rows="3" cols="40"
                            >
                            <input type="number" name="priceGood" value="<?=$changeGood['price']?>"  step="0.1" required min="0">

                        </div>

                        <textarea type="text" name="descriptionGood"  rows="15" cols="60" required
                        ><?=$changeGood['description']?></textarea>
                        <button type="submit" name="redactGoodButton" value="<?=$idGood?>">Изменить</button>
                    </form>
                </fieldset>
                <p class="message"><?=$message?></p>

            </div>
        </body>
        </html>
<?php
        endwhile;
    endif;

