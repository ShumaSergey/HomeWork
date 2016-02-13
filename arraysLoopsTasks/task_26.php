<?php
/*
26. Вам нужно создать массив и заполнить его случайными числами от 1 до 100 (ф­я rand).
Далее, вычислить произведение тех элементов, которые больше ноля и у которых парные индексы.
После вывести на экран элементы, которые больше ноля и у которых не парный индекс.
 */

$myArray = [];
$myArrayOdd = [];
$minValue = 0;
$maxValue = 20;
$multi = 1;

for ($i = $minValue; $i < $maxValue; $i++){
    $myArray[$i] = rand(1, 100);
}

echo '<pre>';
print_r($myArray);
echo '</pre>';

for ($i = $minValue; $i < $maxValue; $i++) {
    if ($i % 2 != 0){
        $myArrayOdd[$i] = $myArray[$i];
    } else {
        $multi *= $myArray[$i];
    }
}
//echo "Произведение элементов, которые больше ноля и у которых парные индексы = $multi"."<br>";
echo '<pre>';
print_r($myArrayOdd);
echo '</pre>';
