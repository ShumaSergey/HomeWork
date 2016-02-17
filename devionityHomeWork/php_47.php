<?php
/**
Создать алгоритм определения всех простых чисел в промежутке
 * от 1 до 100 при помощи for.
 * Простое число - это число которое делится только на себя и на 1
 */
$min = 1;
$max = 100;

/*
 * Выполнение задачи чере функцию Prime($n) - поиска простого числа
function Prime($n)
{
    for($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

$arr = range($min,$max);
foreach($arr as $item) {
    if ((Prime($item))&&($item != 1)) {
        echo $item . "<br>";
    }
}
*/
$prime = false; 
    
for ($i = $min; $i <= $max; $i++) {
    for ($j = 2; $j <= sqrt($i)+1; $j++) {
        if ($i % $j == 0) {
            $prime = false;
            break;
        } else {
            $prime = true;
        }
    }
    if ($i == 2) {
        echo $i . "<br>";
    } elseif (($prime == true)&&($i != 1)){
        echo $i . "<br>";
    }
}