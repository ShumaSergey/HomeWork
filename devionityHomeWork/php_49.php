<?php
/**
Создать массив из 10 любых числовых значений. При помощи foreach
 * вывести на экран те значения, которые делятся на 3
 */

$arr = array();
$min = 1;
$max = 10;

for ($i = $min; $i <= $max; $i++) {
    $arr[$i] = rand(1,100);
}

echo "<pre>";
print_r($arr);
echo "</pre>";

foreach ($arr as $index => $item) {
    if ($item % 3 == 0){
        echo ($arr[$index]) . "  ";
    }
}