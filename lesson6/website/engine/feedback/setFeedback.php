<?php
    include_once ("../../config/config.php");
    global $connect;

    $useranswer = (int)strip_tags(htmlspecialchars($_POST["useranswer"]));

    if ($_POST["trueanswer"] == $useranswer) {

        $textFeedback = strip_tags(htmlspecialchars($_POST["textFeedback"]));
        $author = $_POST["username"] ? strip_tags(htmlspecialchars($_POST["username"])) : "Анонимный пользователь";
        $date = date("Y-m-d H:i:s");
        $setFeedbackSQL = "INSERT INTO feedback (author, text, date) VALUES ('$author', '$textFeedback', '$date')";

        $setFeedbackQuery = mysqli_query($connect, $setFeedbackSQL);

        if ($setFeedbackQuery) {
            header("Location: feedback.php");
        } else {
            $errMessage = "Произошла ошибка при добавлении комментария.";
        }

    } else {
        header("Location: feedback.php");
    }

