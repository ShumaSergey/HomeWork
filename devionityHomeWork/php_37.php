<?php
/**
 * Создать алгоритм обмена значениями двух переменных не используя третьей.
 */
$variable1 = 1;
$variable2 = 3;

$variable1 = $variable1 ^ $variable2;
$variable2 = $variable2 ^ $variable1;
$variable1 = $variable1 ^ $variable2;
echo $variable1."<br>";
echo $variable2."<br>";

$variable1 /= $variable2;
$variable2 *= $variable1;
$variable1 = $variable2 / $variable1;
echo $variable1."<br>";
echo $variable2."<br>";

$arr1 = array('name' => 'Mike');
$arr2 = array('age' => 34);

