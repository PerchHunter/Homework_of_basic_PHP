<?php
	/*
	Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в
	качестве значений – массивы с названиями городов из соответствующей области.
	Вывести в цикле значения массива, чтобы результат был таким:
	Московская область:
	Москва, Зеленоград, Клин.
	Ленинградская область:
	Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
	Рязанская область…(названия городов можно найти на maps.yandex.ru)
	*/


	$region = ["Московская область", "Оренбургская область", "Смоленская область"];

	$cities = [
		["Москва", "Зеленоград", "Клин", "Балашиха", "Волоколамск", "Белоозёрский"],
		["Оренбург", "Орск", "Бузулук", "Тоцкое", "Ташла", "Сорочинск"],
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

		for ( $i = 0; $i < count($reg); $i++ ) :
			//Индексы должны совпадать.
			//Если будет лишний массив городов, а региона нет,
			// то города не попадут в массив
			$regAndCity[$reg[$i]] = $city[$i];
		endfor;

		return $regAndCity;
	}

	//Создаём общий массив
	$regionAndCities = mergeRegionAndCities($region, $cities);

	// print_r($regionAndCities);

	foreach ($regionAndCities as $key => $value) {?>

		<h1><?=$key?></h1><ol>

		<?php
		//просто проверка на массив. А то мало ли...
		if (is_array($value)) :

			for ($i = 0; $i < count($value); $i++) :?>
				<li><?=$value[$i]?></li>
			<?php
			endfor;

		else :?>
			<h1>В списке <?=$key?> возникла ошибка. Список городов не массив, либо его вообще нет</h1>
		<?php
		endif;
		?>
		</ol><a href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA_%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D0%BE%D0%B2_%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D0%B8">Другие города</a><hr>
		<?php
	}
?>