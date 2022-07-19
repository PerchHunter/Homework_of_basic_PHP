<?php

    if ($_SESSION['userID']) {     //если юзер авторизован
        $userOrTemporaryId = $_SESSION['userID'];
        $getGoodsFromCartSQL = "SELECT * FROM cart WHERE user_id = '$userOrTemporaryId'";
    } elseif ($_COOKIE['temporaryUserId']) { //если он не авторизован и добавлял товары, ему был присвоен временный id
        $userOrTemporaryId = $_COOKIE['temporaryUserId'];
        $getGoodsFromCartSQL = "SELECT * FROM cart WHERE temporary_user_id = '$userOrTemporaryId'";
    }

    $getGoodsFromCartQuery = $userOrTemporaryId ? mysqli_query($connect, $getGoodsFromCartSQL) : null;

    if (!$getGoodsFromCartQuery) :?>

<h1>Ваша корзина пуста</h1>

    <?php
    else:?>

<table class="cartTable">
    <thead>
        <tr>
            <th class="tableColumnsHead">Наименование</th>
            <th class="tableColumnsHead">Цена</th>
            <th class="tableColumnsHead">Количество</th>
            <th class="tableColumnsHead">Удалить</th>
        </tr>
    </thead>
    <tbody>

<?php
    $allTitles = 0; //общее кол-во наименований
    $sumPrice = 0; // всего к оплате

    while($goods = mysqli_fetch_assoc($getGoodsFromCartQuery)) :
        ++$allTitles;
        $sumPrice += $goods['good_price'] * $goods['good_count'];
        ?>

        <tr>
        <td class="tableColumnsBody"><?=$goods['good_name']?></td>
        <td class="tableColumnsBody"><?=$goods['good_price']?></td>
        <td class="tableColumnsBody">
            <input id="<?="countGood".$goods['good_id']?>" type="number" value="<?=$goods['good_count']?>" min="1"/>
            <button onclick="updateSumPriceOfCart(<?=$goods['good_id']?>)">Обновить</button>
        </td>
        <td class="tableColumnsBody" onclick="removeGoodFromCart(<?=$goods['good_id']?>)"><button>Удалить</button></td>
      </tr>

<?php
    endwhile;
?>

    </tbody>
    <tfoot>
    <tr>
        <td class="tableColumnsBody">Всего наименований: <span id="allTitles"><?=$allTitles?></span></td>
        <td class="tableColumnsBody">Всего к оплате: <span id="sumPrice"><?=$sumPrice?></span></td>
    </tr>
    </tfoot>
</table>

<?php
    endif;
?>


