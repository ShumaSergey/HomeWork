<?php
/**
Создать алгоритм определения всех простых чисел
 * в промежутке от 1 до 100 при помощи while.
 * Простое число - это число которое делится только на себя и на 1
 */

$min = 1;
$max = 100;
$rangeMin = $min;
$rangeMax = $max;

while( $rangeMin <= $rangeMax) {
    for ($j = 2; $j <= sqrt($rangeMin)+1; $j++) {
        if ($rangeMin % $j == 0) {
            $prime = false;
            break;
        } else {
            $prime = true;
        }
    }
    if ($rangeMin == 2) {
        echo $rangeMin . "<br>";
    } elseif (($prime == true)&&($rangeMin != 1)){
        echo $rangeMin . "<br>";
    }
    $rangeMin++;
}