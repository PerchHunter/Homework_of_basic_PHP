<?php
    $directory = scandir("../public/images");

    function createGallery($files) {

        for ($i = 2; $i < count($files); $i++) :?>
            <a href="../public/images/<?=$files[$i]?>" data-fancybox="gallery" data-caption="Lorem ipsum dolores" >
                <img class="photo" src="../public/images/<?=$files[$i]?>"/>
            </a>
        <?php
        endfor;
    }

    createGallery($directory);
