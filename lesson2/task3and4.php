<?php

	$a = rand(-100,100);
	$b = rand(-100,100);
	$operators = ["-", "+", "*", "/"];
	$countOperators = count($operators);
	$operator = $operators[rand(0, $countOperators - 1)] ;

	echo "a = $a,<br>b = $b,<br>operator = $operator"."<hr>";

	function sum($a, $b) {
		return $a + $b;
	}

	function difference($a, $b) {
		return $a - $b;
	}

	function multiplier($a, $b) {
		return  $a * $b;
	}

	function division($a, $b) {
		if ($b) {
			return (float)$a / $b;
		} else {
			// return "На ноль не делим!";
			$err = new Error("Страшная ошибка. Мы делим на 0!");
			return $err->getMessage();
		}

	}


	function primaryFunc($arg1, $arg2, $oper) {

		switch ($oper) {
			case '-':
				return difference($arg1, $arg2);
			case '+':
				return sum($arg1, $arg2);
			case '*':
				return multiplier($arg1, $arg2);
			case '/':
				return division($arg1, $arg2);
			default:
				// return "Мы не знаем такой операции :)";
				$err = new Error("Мы не знаем такой операции :)");
				return $err->getMessage();
		}
	}


	echo primaryFunc($a, $b, $operator);