<?php
/* Задача 3. Фронт */

define("DIGITS", "777-77-77");

/*  Телефоны с кодом 8 (800) являются негеоргафическими и бесплатными для абонента.
	Поэтому для людей из разных городов этот номер является единым. 
	Различаться будет телефонный номер офиса в конкретном городе. 
	Вывод на страницу именно этого телефона маркетолог, скорее всего, имел ввиду.
	Номер с кодом 8 (800) для всех городов делаем одинаковым.
*/

$tel = "Горячая линия: <a href='tel:8-800-" . DIGITS . "'>8-800-". DIGITS ."</a><br>";

// Функция получения города пользователя
function get_city()
{
	$city = !empty($_GET['city']) ? $_GET['city'] : 'Москва';
	return $city;
}

$city = get_city();

// Создаём массив соответствия телефона городу
$city_tel = array('Москва' => '8-495-111-11-11', 'Иваново' => '8-4932-22-22-22', 'Екатеринбург' => '8-343-333-33-33');


// Сравниваем город пользователя с городами из массива соответствия и отображаем нужный телефон
foreach($city_tel as $tel_key => $tel_value)
{
	if ($city == $tel_key) {
		$tel .= "Телефон в городе ". $tel_key .": <a href='tel:" . $tel_value . "'>". $tel_value ."</a>";
	}
}

?>

<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200&display=swap" rel="stylesheet">
	<link href="css/contacts.css" rel="stylesheet" />
	<title>Контактная информация</title>
</head>
<body>
	<header>
		<div class='top_city'>
			<a onclick='cityChange()'><?=  $city; ?></a>
		</div>
		<div class='top_telephon'>
			<?= $tel; ?>
		</div>
		<script>
			function cityChange()
			{
				// отображение блока с выбором города
				document.getElementById('city_change').style = 'display: block;';
			}
		</script>
	</header>
	<div class='main'>
		<div class='contact_title'>Страница с контактной информацией
		</div>
		
		<div class='city_change' id='city_change'>
			<div class='city_change_title'>
				Укажите Ваш город
			</div>
			<div class='city_change_list'>
				<a href='?city=Москва'>Москва</a>
				<a href='?city=Иваново'>Иваново</a>
				<a href='?city=Екатеринбург'>Екатеринбург</a>
			</div>
		</div>
	</div>
	<footer>
		<div class='bottom_telephone'>
			<?= $tel; ?>
		</div>
	</footer>
</body>
</html>
