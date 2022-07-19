<?php
    include_once ("../../config/config.php");
    global $connect;

    $getReviewsSQL = "SELECT * FROM feedback";

    $getReviewsQuery = mysqli_query($connect, $getReviewsSQL);

    while($data = mysqli_fetch_assoc($getReviewsQuery)) :?>
        <div class="feedback">
            <p class="textFeedback"><?=$data['text']?></p>
            <div class="metainfo">
                <p class="author"><?=$data['author']?></p>
                <time datetime="#"><?=$data['date']?></time>
            </div>

        </div>
    <?php
    endwhile;
