<?php
    $images = scandir("../public/images");

    function createGallery($pathToFile) {
        for ($i = 2; $i < count($pathToFile); $i++) :?>
        <a href="./photos/details.php?name=<?=$pathToFile[$i]?>"><img class="photo" src="../public/images/<?=$pathToFile[$i]?>" alt="photo"/></a>
    <?php
    endfor;
    }

    createGallery($images);
