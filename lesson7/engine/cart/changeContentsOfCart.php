<?php
session_start();

include_once ("../../config/config.php");

function noScript($connect_f, $count) {
   $number = mysqli_real_escape_string($connect_f, (int)htmlspecialchars(strip_tags($count)));

    return $number ? $number : exit;
}

function addGood ($connect_f, $goodID_f, $goodCount_f, $userOrTemporaryId_f, $goodName_f, $goodPrice_f, $currentGoodCount_f) {
    if ($currentGoodCount_f) { //обновляем количество, если он был в корзине
        $sumGoodCount = $currentGoodCount_f + $goodCount_f;

        if ($userOrTemporaryId_f >= 10000000) {
            $changeCartSQL = "UPDATE cart SET good_count = '$sumGoodCount' WHERE good_id = '$goodID_f' AND temporary_user_id = '$userOrTemporaryId_f'";
        } else {
            $changeCartSQL = "UPDATE cart SET good_count = '$sumGoodCount' WHERE good_id = '$goodID_f' AND user_id = '$userOrTemporaryId_f'";
        }

    } elseif ($userOrTemporaryId_f >= 10000000) { //если юзер не авторизован, к записи в БД вместо id присваиваем временный id
        $changeCartSQL = "INSERT INTO cart (good_id, good_name, good_price, good_count, temporary_user_id) VALUES ('$goodID_f', '$goodName_f', '$goodPrice_f', '$goodCount_f', '$userOrTemporaryId_f')";

    } else {
        $changeCartSQL = "INSERT INTO cart (good_id, good_name, good_price, good_count, user_id) VALUES ('$goodID_f', '$goodName_f', '$goodPrice_f', '$goodCount_f', '$userOrTemporaryId_f')";
    }

    $changeCartQuery = mysqli_query($connect_f, $changeCartSQL);

    if ($changeCartQuery) {
        return "Товар успешно добавлен в корзину";
    } else {
        return die(mysqli_error($changeCartQuery));
    }
}


function updateGood($connect_f, $goodID_f, $goodCount_f, $userOrTemporaryId_f) {
    if ($userOrTemporaryId_f >= 10000000) {
        $changeCartSQL = "UPDATE cart SET good_count = '$goodCount_f' WHERE good_id = '$goodID_f' AND temporary_user_id = '$userOrTemporaryId_f'";
        $getGoodsFromCartSQL = "SELECT good_price, good_count FROM cart WHERE temporary_user_id = '$userOrTemporaryId_f'";
    } else {
        $changeCartSQL = "UPDATE cart SET good_count = '$goodCount_f' WHERE good_id = '$goodID_f' AND user_id = '$userOrTemporaryId_f'";
        $getGoodsFromCartSQL = "SELECT good_price, good_count FROM cart WHERE user_id = '$userOrTemporaryId_f'";
    }

    $changeCartQuery = mysqli_query($connect_f, $changeCartSQL);

    //обновляем общую сумму товаров корзины
    $getGoodsFromCartSQL = mysqli_query($connect_f, $getGoodsFromCartSQL);
    $allTitles = 0;
    $sumPrice = 0;
    while ($goods = mysqli_fetch_assoc($getGoodsFromCartSQL)) {
        ++$allTitles;
        $sumPrice += $goods['good_price'] * $goods['good_count'];
    }

    if ($changeCartQuery && $getGoodsFromCartSQL) {
       return $sumPrice;
    } else {
       return die(mysqli_error($changeCartQuery));
    }
}


function deleteGood($connect_f, $goodID_f, $userOrTemporaryId_f) {
    if ($userOrTemporaryId_f >= 10000000) {
        $deleteGoodSQL = "DELETE FROM cart WHERE good_id = '$goodID_f' AND temporary_user_id = '$userOrTemporaryId_f'";
    } else {
        $deleteGoodSQL = "DELETE FROM cart WHERE good_id = '$goodID_f' AND user_id = '$userOrTemporaryId_f'";
    }

    $deleteGoodQuery = mysqli_query($connect_f, $deleteGoodSQL);

    if ($deleteGoodQuery) {
    return "cart.php";
    }

}


$goodID = $_POST['id'];
$action = $_POST['action'];

$goodCount = ($action == 'update') ?  noScript($connect, $_POST['count']) : $_POST['count'];


if ($_SESSION['userID']) { // если юзер авторизован
    $userOrTemporaryId = $_SESSION['userID'];
} elseif ($_COOKIE['temporaryUserId']) {  // если юзер не зарегистрирован, но уже добавлял товары в корзину, ему уже был присвоен временный id
    $userOrTemporaryId = $_COOKIE['temporaryUserId'];
} else { // присваиваем рандомный временный id
    $userOrTemporaryId = rand(10000000, 20000000);
    setcookie("temporaryUserId", $userOrTemporaryId, time() + 3600 * 24 * 7, "/");
}

$getGoodSQL = "SELECT * FROM goods WHERE id = '$goodID'";
$getGoodQuery = mysqli_fetch_assoc(mysqli_query($connect, $getGoodSQL));

$goodName = $getGoodQuery['name'];
$goodPrice = $getGoodQuery['price'];

//проверяем, был ли уже в корзине этот товар
if ($userOrTemporaryId >= 10000000) {
    $getGoodCountSQL = "SELECT good_count FROM cart WHERE good_id = '$goodID' AND temporary_user_id = '$userOrTemporaryId'";
} else {
    $getGoodCountSQL = "SELECT good_count FROM cart WHERE good_id = '$goodID' AND user_id = '$userOrTemporaryId'";
}

//если был, то получим его количество
$currentGoodCount = mysqli_fetch_assoc(mysqli_query($connect, $getGoodCountSQL))['good_count'];

if ($action == 'add') { //добавляем товар
    $result = addGood($connect, $goodID, $goodCount, $userOrTemporaryId, $goodName, $goodPrice, $currentGoodCount);
} elseif ($action == 'update') { //изменяем количество
    $result = updateGood($connect, $goodID, $goodCount, $userOrTemporaryId);

} elseif ($action == 'delete') {
    $result = deleteGood($connect, $goodID, $userOrTemporaryId);
}

echo $result;