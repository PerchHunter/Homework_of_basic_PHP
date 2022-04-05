<?php

	/*
	Задание 8
	Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в
	качестве значений – массивы с названиями городов из соответствующей области.
	Вывести в цикле значения массива, чтобы результат был таким:
	Московская область:
	Москва, Зеленоград, Клин.
	Ленинградская область:
	Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
	Рязанская область…(названия городов можно найти на maps.yandex.ru)
	*/


	/*
	Задание 8
	*Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К»
	*/

	$region = ["Московская область", "Оренбургская область", "Смоленская область"];

	$cities = [
		["Москва", "Зеленоград", "Клин", "Балашиха", "Королёв", "Коломна"],
		["Оренбург", "Орск", "Бузулук", "Кувандык", "Ташла", "Сорочинск"],
		["Смоленск", "Рославль", "Ярцево", "Рудня", "Починок", "Велиж"]
	];


	/**
	 * Функция слияния массивов регионов и их городов в ассоциативный массив.
	 * В реальном проекте, чтобы не перепутать города и регионы, можно было бы
	 * в исходных массивах использовать в качестве ключей номера регионов и потом совмещать их.
	 * @param [array] $[region], [array] $[cities]
	 * @return [array] [<ассоциативный массив регионов и их городов>]
	 */

	function mergeRegionAndCities($reg, $city) {
		$regAndCity = [];

		for ( $i = 0; $i < count($reg); $i++ ) {
			//Индексы должны совпадать.
			//Если будет лишний массив городов, а региона нет,
			// то города не попадут в массив
			$regAndCity[$reg[$i]] = $city[$i];
		}
		return $regAndCity;
	}

	//Создаём общий массив
	$regionAndCities = mergeRegionAndCities($region, $cities);

	// print_r($regionAndCities);

	foreach ($regionAndCities as $key => $value) {
		$list = "<h1>$key</h1>"."<ol>";

		//просто проверка на массив.
		if (is_array($value)) {

			for ($i = 0; $i < count($value); $i++) {
				//к заданию 8:
				//смотрим, идёт ли первой буквой "К"
				$substr = mb_substr($value[$i], 0, 1);

				if ($substr !== "К") {
					continue;
				}

				$list .= "<li>$value[$i]</li>";
			}

		} else {
			echo "В списке $key возникла ошибка. Список городов не массив, либо его вообще нет";
		}

		$list .= "</ol><a href='https://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D0%BE%D0%B2_%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D0%B8'>Другие города</a><hr>";
		echo $list;
	}
?>