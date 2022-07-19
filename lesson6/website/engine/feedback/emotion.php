<?php

    if ($_GET["like"] || $_GET["dislike"]) {
        $idFeedback = isset($_GET["like"]) ? $_GET["like"] : $_GET["dislike"];

        $findFeedbackSQL = "SELECT dislike, like_it FROM feedback WHERE id = '$idFeedback'";
        $findFeedbackQuery = mysqli_query($connect, $findFeedbackSQL);

        while ($likes = mysqli_fetch_assoc($findFeedbackQuery)) {
            if ($_GET["like"]) {
                ++$likes['like_it'];
                $addEmotionSQL = "UPDATE feedback SET like_it = {$likes['like_it']} WHERE id = '$idFeedback'";
            } elseif  ($_GET["dislike"]) {
                ++$likes['dislike'];
                $addEmotionSQL = "UPDATE feedback SET dislike = {$likes['dislike']} WHERE id = '$idFeedback'";
            }

            $addEmotionQuery = mysqli_query($connect, $addEmotionSQL);
        }
    }

