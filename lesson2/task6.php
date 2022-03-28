<?php

	$val = rand(1,100) / 10;
	$pow = rand(0,10);

	echo "Число = $val,<br>Степень = $pow,<br>"."<hr>";

	function power($number, $pow) {
		if (!$pow) {
			return 1;
		}
		return $number * power($number, $pow - 1);
	}

	echo power($val, $pow);