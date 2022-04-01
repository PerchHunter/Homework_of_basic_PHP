<?php

	/*
	В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
	Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать,
	как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
	*/




	$list = ["Программы обучения" => [
				"Программирование" => "/programming",
				"Аналитика" => "/analytics",
				"Маркетинг" => "/marketing",
				"Дизайн" => "/design"
				],
			"Мероприятия" => [
				"Путь в IT" => "/put'_v_IT",
				"Мир глазами разработчиков" => "/mir_glazami_razrabotchikov"
				],
			"База знаний" => [
				"Дизайн" => "/baza_znanij/dizajn",
				"Управление" => "/baza_znanij/upravlenie"
				],
			"Поиск работы" => [
				"Вакансии" => "/vakansii"
				],
			"О компании" => "/o_kompanii"
			]
?>
	<ul>
<?php
	foreach ($list as $key => $value) :

		if (is_array($value)) :?>
			<li><h3><?=$key?></h3></li>
			<ul>
			<?php
			foreach ($value as $nestedKey => $nestedValue) :?>
				<li><a href=<?=$nestedValue?>><?=$nestedKey?></a></li>
			<?php
			endforeach;
			?>
			</ul>
		<?php
		else :?>
			<li><a href=<?=$value?>><h3><?=$key?></h3></a></li>
		<?php
		endif;
	endforeach;
	?>

	</ul>



<?php
	//РЕКУРСИЯ
/*	function listOutput($list) {

		$output = "<ul>";

		foreach ($list as $key => $value) {
			$output .= "<li><a href=#>$key</a></li>";

			if (is_array($value)) {
				$output .= listOutput($value);
			}

		}

		$output .= "</ul>";

		return $output;
	}

	echo listOutput($list);
*/