<?php
/* Задача 2. Массивы */

$row = 5; // Количество строк в массиве
$col = 7; // Количество столбцов в массиве
$uniq_count = 0; // Порядок числа в массиве уникальных чисел

$mass = array();
$row_sum = array();
$col_sum = array();

for ($i = 0; $i < $row; $i++)
{
	for($j = 0; $j < $col; $j++)
	{ 
		// Генерируем массив чисел от 1 до 1000, перемешиваем их и по порядку присваиваем в строчный массив
		$uniq_num = range(1, 1000);
		shuffle($uniq_num);
		$mass_row[$j] = $uniq_num[$uniq_count];
		$uniq_count++;
		
		// Суммируем все числа, стоящие в определённом столбце
		$col_sum[$j] += $mass_row[$j];
	}
	// Формируем двухмерный массив из строчных массивов
	$mass[$i] = $mass_row;
	
	// Суммируем все числа в каждой из строк
	$row_sum[$i] = array_sum($mass_row);
	
}

echo "Массив: ";
print_r($mass);

echo "<br>Сумма по строкам: ";
print_r($row_sum);

echo "<br>Сумма по столбцам: ";
print_r($col_sum);
?>