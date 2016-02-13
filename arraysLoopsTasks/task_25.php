<?php
/*
25. Ваше задание создать массив, наполнить это случайными значениями (функция rand),
найти максимальное и минимальное значение и поменять их местами.
 */


$myArray=[];
$minValue = 0;
$maxValue = 10;
$minElement = $maxElement = 0;
$minCounter = 0;
$maxCounter = 0;

for ($i = $minValue; $i < $maxValue; $i++){
    $myArray[$i] = rand(1, 20);
}

echo '<pre>';
print_r($myArray);
echo '</pre>';

$minElement = $myArray[0];
for ($i = $minValue+1; $i <= $maxValue-1; $i++) {
    if ($minElement > $myArray[$i]) {
        $minElement = $myArray[$i];
        $minCounter = $i;
    }
}
echo "min елемент массива : $minElement"."<br>";

$maxElement = $myArray[0];
for ($i = $minValue+1; $i <= $maxValue-1; $i++) {
    if ($maxElement < $myArray[$i]) {
        $maxElement = $myArray[$i];
        $maxCounter = $i;
    }
}
echo "max елемент массива : $maxElement";
$myArray[$minCounter] = $maxElement;
$myArray[$maxCounter] = $minElement;

echo "<br>";
echo '<pre>';
print_r($myArray);
echo '</pre>';
