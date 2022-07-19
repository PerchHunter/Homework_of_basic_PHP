<div class="headerBackground">
    <div class="container">
        <header class="header">
            <nav class="headerNavigation">
                <?php
                if ($_SESSION['admin']) :?>
                    <a href="/engine/admin/index.php">Админка</a>
                <?php
                endif;
                ?>
                <a href="/engine/index.php">Главная</a>
                <a href="/engine/catalog/catalog.php">Каталог</a>
                <a href="/engine/gallery/gallery.php">Фотогалерея</a>
                <a href="/engine/feedback/feedback.php">Отзывы</a>
                <a href="/engine/cart/cart.php">Корзина</a>
                <?php
                    if ($_COOKIE['login'] || $_SESSION['admin']):?>
                <a href="/engine/personalCabinet/personalCabinet.php">Личный кабинет</a>
                <a href="/engine/auth/logOut.php">Выйти</a>
                <?php
                    endif;
                ?>
            </nav>
        </header>
    </div>
</div>