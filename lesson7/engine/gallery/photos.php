<?php
    $getImagesQuery = mysqli_query($connect, "SELECT * FROM photos ORDER BY views DESC");

    while($data = mysqli_fetch_assoc($getImagesQuery)):?>
             <div class="photoWrap">
                 <a href="/engine/gallery/details.php?id=<?=$data['id']?>">
                     <img class="photo" src="/public/images/images_small/<?=$data['name']?>" alt="photo"/>
                 </a>
                 <div class="contentUnderPhoto">
                     <div class="visibilityIconWrap">
                         <span class="material-icons visibility_icon">visibility</span>
                         <span><?=$data['views']?></span>
                     </div>
                 </div>
             </div>
    <?php
    endwhile;
