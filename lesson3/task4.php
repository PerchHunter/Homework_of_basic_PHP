<?php


	$alphabet = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'ch', 'ъ' => '\'', 'ы' => 'y', 'ь' => '\'', 'э' => 'eh', 'ю' => 'yu', 'я' => 'ya'];


	$phrase = "Я лЮбЛю ПрОгРаМмИрОвАтЬ!!!!!111111";

	/**
	 * @param [string] $[$phrase], [array] $[$alphabet] [преобразует строку в массив,
	 * берёт из него элемент и сравнивает с ключом алфавита ]
	 * @return [string] [преобразованная строка]
	 */

	function translate($phrase, $alphabet)  {

		$strToArr = mb_str_split($phrase);
		$translateString = "";

		for ($i=0; $i < count($strToArr); $i++) {
			$symbol = $strToArr[$i];
			$upperCase = ($symbol === mb_strtoupper($symbol));

			// если символ в верхнем регистре...
			if ($upperCase) {
				$symbol = mb_strtolower($symbol);
			}

			// ищем символ в массиве
			$translSymbol = $alphabet[$symbol];

			// если символ был в верхнем регистре и его нашли в массиве
			if ($upperCase && $translSymbol) {
				// приводим полученный символ из массива к верхнему регистру
				$translSymbol = mb_strtoupper($translSymbol);
				$translateString .= $translSymbol;
			// если символ был в нижнем регистре и его нашли в массиве
			} elseif ($translSymbol) {
				$translateString .= $translSymbol;
			} else {
				// все остальные символы
				$translateString .= $symbol;
			}
		}

		return $translateString;
	}

	echo "<p>".translate($phrase, $alphabet)."</p>";




	//УПРОЩЁННЫЙ ВАРИАНТ
	//пришлось добавить буквы верхнего регистра в массив
	$alphabetTwo = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'ch', 'ъ' => '\'', 'ы' => 'y', 'ь' => '\'', 'э' => 'eh', 'ю' => 'yu', 'я' => 'ya', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'CH', 'Ъ' => '\'', 'Ы' => 'Y', 'Ь' => '\'', 'Э' => 'EH', 'Ю' => 'YU', 'Я' => 'YA'
	];


	$translateTwo = fn () => strtr($phrase, $alphabetTwo);


	echo "<p>".$translateTwo()."</p>";