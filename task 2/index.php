<?php
/* Задача 2. Массивы */

$row = 5; // Количество строк в массиве
$col = 7; // Количество столбцов в массиве

$mass = array();
$mass_row = array();
$row_sum = array();
$col_sum = array();

for ($i = 0; $i < $row; $i++)
{
	for($j = 0; $j < $col; $j++)
	{ 
		// Добавляем уникальное число в строчный массив
		$mass_row[$j] = uniq_num($mass_row, $mass);
		
		// Суммируем все числа, стоящие в определённом столбце
		$col_sum[$j] += $mass_row[$j];
	}
	// Формируем двухмерный массив из строчных массивов
	$mass[$i] = $mass_row;
	
	// Суммируем все числа в каждой из строк
	$row_sum[$i] = array_sum($mass_row);
	
	// Очищаем строчный массив для формирования следующей строки
	$mass_row = array();
	
}

// Функция генерации и проверки числа на уникальность
function uniq_num($mass_row, $mass) {
	// Генерируем произвольное число от 1 до 1000
	$rand_num = rand(1, 1000);
	
	// Проверка на не вхождение числа в текущий строчный массив и двухмерный массив
	if (!in_array($rand_num, $mass_row) and !in_array_dim($rand_num, $mass)) {
		
		// Если число уникально, возвращаем его для добавления в массив
		return $rand_num;
	} else {

		// Если число повторяется, запускаем функцию повторно
		return uniq_num($mass_row, $mass);
	}
}

// Функция проверки уникальности числа в двухмерном массиве
function in_array_dim($rand_num, $mass) {
    foreach ($mass as $m) {
		
		// Проверяем равно ли искомое число элементу массива. Если елемент массива является массивом, повторяем проверку
        if (($m == $rand_num) or (is_array($m) and in_array_dim($rand_num, $m))) {
			
            return true;
        }
    }

    return false;
}

echo "Массив: ";
print_r($mass);

echo "<br>Сумма по строкам: ";
print_r($row_sum);

echo "<br>Сумма по столбцам: ";
print_r($col_sum);
?>