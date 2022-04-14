<?php
	/*
	С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без
	остатка
	*/

	$startPoint = 0;
	$endPoint = 100;
	$divider = 3;

	echo "Числа от $startPoint до $endPoint, кратные $divider:"."<hr>";

	while ($startPoint <= $endPoint) {
		//первым условием отбрасываем 0
		echo ($startPoint && $startPoint % $divider === 0) ? "$startPoint\n" : null;
		$startPoint++;
	}

