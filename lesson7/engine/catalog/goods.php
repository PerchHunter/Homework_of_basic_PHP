<?php
    $getGoodsSQL = ($_SERVER['PHP_SELF'] == '/engine/index.php') ? "SELECT * FROM goods ORDER BY views DESC LIMIT 4" : "SELECT * FROM goods";
    $getGoodsQuery = mysqli_query($connect, $getGoodsSQL);

//если мы из админки заходим  с $_GET['param'] == 'catalogAdmin', то можем добавлять и удалять товары
//если просто получаем список товаров, то этих функций не будет
    ?>

 <div class="goodsWrap">

<?php
    while ($data = mysqli_fetch_assoc($getGoodsQuery)) :?>

        <div class="productWrap">
            <div class="productImage">
                <a href="#">
                    <img alt="<?=$data['name']?>" src=<?=$_GET['param'] == 'catalogAdmin' ? GOODS_SMALL.$data['path'] : "/public/photoGoods/photoGoods_small/".$data['path']?>>
                    <div class="shadow"></div>
                </a>
                <a class="detailLink" href="/engine/catalog/detailsGood.php?id=<?=$data['id']; $_SESSION['admin'] ? '&admin=true' : null?>" title="Быстрый просмотр"></a>
                <div class="actions">
                    <div class="actionsBtn">
                        <a class="addToCart" href="#" onclick="addContentsOfCart(<?=$data['id']?>)" title="Добавить в корзину"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <a class="addToWishlist" href="#" title="Добавить в мои желания"></a>
                        <a class="addToCompare" href="#" title="Добавить для сравнения"></a>
                    </div>
                </div>
            </div>
            <div class="productList">
                <h3><?=$data['name']?></h3>
                <div class="price">&#8381; <?=$data['price']?></div>
                <?php
                if ($_GET['param'] == 'catalogAdmin') :?>
                <form class="deleteGood" action="/engine/admin/handlersGoods/deleteOrRedactGood.php">
                    <button name="redactGood" value="<?=$data['id']?>">Изменить</button>
                    <button name="deleteGood" value="<?=$data['id']?>">Удалить</button>
                </form>

                <?php
                endif;
                ?>

            </div>

            <div class="visibilityGoodWrap">
                <span class="material-icons visibility_icon">visibility</span>
                <span><?=$data['views']?></span>
            </div>
        </div>
<?php
    endwhile;
    ?>
    </div>

    <?php
    if ($_GET['param'] == 'catalogAdmin') :?>
    <div class="addGoodsFormWrap">
        <fieldset class="addGoodsFieldset">
            <legend>Добавить новый товар в каталог</legend>
            <form class="addGoodsForm" action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="file" name="photoGood"  placeholder="Приложить фото товара" multiple required
                    >
                    <input type="text" name="titleGood" placeholder="Название товара" required
                    >
                    <input type="number" name="priceGood" placeholder="Цена товара"  step="0.1" required min="0"></div>

                <textarea name="descriptionGood" placeholder="Описание товара" rows="15" cols="60" required
                ></textarea>
                <button type="submit" name="addGoodButton">Добавить в каталог</button>
            </form>
        </fieldset>
    </div>

    <?php
    endif;?>
    <script src="/public/js/ajax.js"></script>
