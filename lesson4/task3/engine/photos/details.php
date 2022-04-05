<?php
if($_GET['name']):?>
       <img  style="width: 500px" src="../../public/images/<?=$_GET["name"]?>" alt="photo"/>
    <?php
    endif;
    ?>

    <a href="<?= $_SERVER['HTTP_REFERER']?>">Вернуться назад</a>