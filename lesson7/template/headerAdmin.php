<div class="headerBackground">
    <h1>Админка</h1>
    <div class="container">
        <header class="header">
            <nav class="headerNavigation">
                <a href="/engine/index.php">Главная</a>
                <a href="/engine/admin/?param=catalogAdmin">Каталог товаров</a>
                <a href="/engine/admin/?param=galleryAdmin">Фотогалерея</a>
                <a href="/engine/admin/?param=feedbackAdmin">Отзывы</a>
            </nav>
        </header>
    </div>

    <?php
    if  ($_GET['param'] == 'galleryAdmin') :?>

        <button  class="openFormButton" >Загрузить фото</button>

        <div class="windowWithForm">
            <form id="setImageForm" action="handlersGallery/addImage.php" method="post" enctype="multipart/form-data">
                <label class="label">
                    <span class="material-icons attach_icon">attach_file</span>
                    <span class="title">Добавить файл</span>
                    <input class="setImageInput" type="file" name="userfile" accept="image/*"/>
                </label>
                <button class="setImageButton" type="submit" form="setImageForm" name="setImageButton">
                    Загрузить файл
                </button>
            </form>
        </div>
    <?php
    endif;
    ?>
</div>