<?php
/**
Создать алгоритм для определения первого найденного простого числа
в промежутке от 200 до 400.
 */
$min = 200;
$max = 400;
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
        break;
    } elseif (($prime == true)&&($i != 1)){
        echo $i . "<br>";
        break;
    }
}