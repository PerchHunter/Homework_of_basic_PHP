<?php

	/*	Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает
	видоизмененную строчку.
	*/

	$string ="Привет, мир!     ";
	//что заменяем
	$substring = array(" ",);
	//чем заменяем
	$symbols = array("_",);
	//в обв массива можно добавлять дополнительные символы

	$replaceSubstring = fn () => str_replace($substring, $symbols, $string);

	echo "<h1>".$replaceSubstring()."</h1>";