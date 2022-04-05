<?php
if($_GET['name']):?>
       <img  style="width: 500px" src="../../public/images/<?=$_GET["name"]?>" alt="photo"/>
    <?php
    endif;
    ?>

    <a style="text-decoration: none; color: black" href="<?= $_SERVER['HTTP_REFERER']?>"><p>Вернуться назад</p></a>