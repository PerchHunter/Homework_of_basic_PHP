<?php

    function calculate($arg1, $arg2, $oper) {

        switch ($oper) {
            case '-':
                return $arg1 - $arg2;
            case '+':
                return $arg1 + $arg2;
            case '*':
                return $arg1 * $arg2;
            case '/':
                if ($arg2) {
                    return (float)$arg1 / $arg2;
                } else {
                    $err = new Error("Вы не в JavaScript. Тут на 0 не делят.");
                    return $err->getMessage();
                }
            default:
                $err = new Error("Что - то пошло не так.");
                return $err->getMessage();
        }
    }


    if ($_POST) {
//        print_r($_POST);
        $x = (float)$_POST['x'];
        $y = (float)$_POST['y'];

        $_POST['operation'] ? $operator = $_POST['operation'] : $operator = $_POST['form2'];

        $result = calculate($x, $y, $operator);
    }
