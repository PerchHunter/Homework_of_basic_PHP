<?php

    $capcha = array(rand(0,100));?>

    <p><?=$capcha[0]?></p>

    <?php
    // результат цикла - массив из 5 чисел
    while (count($capcha) <= 4) {
//                print_r(count($capcha));
        $i = rand(0,100);

        //если $i совпадает с каким-то числом в массиве, то пропускаем его. В противном случае добавляем в массив
        for ($j = 0; $j <= count($capcha); $j++ ) {
            if($i == $capcha[$j]) {
                $i = 0;
                break;
            }
        }

        if ($i) :
            array_push($capcha, $i);?>

            <p>&#32;<?=$i?></p>

            <?php
        endif;
    }

    //сортируем числа по возрастанию
    sort($capcha);
