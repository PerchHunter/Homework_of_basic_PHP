<?php
    include_once("server.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="form2Wrap">
        <form action="" method="post">
            <input type="number" name="x"  step="0.1" value="0">
            <input type="number" name="y"  step="0.1" value="0">

            <p><input type="submit" value="+" name="form2"></p>
            <p><input type="submit" value="-" name="form2"></p>
            <p><input type="submit" value="/" name="form2"></p>
            <p><input type="submit" value="*" name="form2"></p>

            <p>Результат: <?=$result?></p>
        </form>
    </div>

</body>
</html>
