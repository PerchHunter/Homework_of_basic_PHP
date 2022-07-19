<?php
    include_once ("../../config/config.php");
    include_once("emotion.php");

    $getReviewsSQL = "SELECT * FROM feedback";

    $getReviewsQuery = mysqli_query($connect, $getReviewsSQL);

    while($data = mysqli_fetch_assoc($getReviewsQuery)) :?>
        <div class="feedback">
            <div class="metainfo">
                <p class="author"><?=$data['author']?></p>
                <time datetime="#"><?=$data['date']?></time>
            </div>
            <p class="textFeedback"><?=$data['text']?></p>

            <div class="reactions">
                <form class="emotionForm" action="">
                    <span class="countLike"><?=$data['like_it']?></span>
                    <button class="likeForReview" type="submit" name="like" value=<?=$data['id']?>>
                        <span class="material-icons">thumb_up</span>
                    </button>
                    <button class="dislikeForReview" type="submit" name="dislike" value=<?=$data['id']?>>
                        <span class="material-icons">thumb_down_alt</span>
                    </button>
                    <span class="countDislike"><?=$data['dislike']?></span>
                </form>
            </div>
        </div>
    <?php
    endwhile;
