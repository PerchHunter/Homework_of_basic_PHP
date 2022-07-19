<?php
    $getImagesQuery = mysqli_query($connect, "SELECT * FROM photos ORDER BY views DESC");
?>
    <div class="gallery">
<?php
    while($data = mysqli_fetch_assoc($getImagesQuery)):?>

            <div class="photoWrap">
                <a href="/engine/gallery/details.php?admin=true&id=<?=$data['id']?>">
                    <img class="photo" src="/public/images/images_small/<?=$data['name']?>" alt="photo"/>
                </a>
                <div class="contentUnderPhoto">
                    <div class="visibilityIconWrap">
                        <span class="material-icons visibility_icon">visibility</span>
                        <span><?=$data['views']?></span>
                    </div>
                    <p>id фото: <?=$data['id']?></p>
                    <form id="deleteImageForm" action="handlersGallery/deleteImage.php" method="post" enctype="multipart/form-data">
                        <button class="deleteImageButton" type="submit" form="deleteImageForm" name="deleteImageButton" value="<?=$data['id']?>">Удалить фото</button>
                    </form>
                </div>
            </div>

<?php
    endwhile;
?>
    </div>
