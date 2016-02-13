<?php
/*
24. Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной вами
цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза.
 */
$userNumber = 12312344;
echo $userNumber." : ";
$userNumber = "" . $userNumber;
$min = 0;
$max = strlen($userNumber);
$userNumber = (int)$userNumber;
$sum = 0;
for ($i = $min; $i < $max; $i++){
    $sum += $userNumber % 10;
    $userNumber = $userNumber / 10;
}
echo $sum;