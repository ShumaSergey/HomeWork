<?php
/*
24. Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной вами
цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза.
 */
$userNumber = 12311211;
$userFindNumber = 1;
echo "В числе : ". $userNumber ." цифра ".$userFindNumber." встречается :";
$userNumber = "" . $userNumber;
$min = 0;
$max = strlen($userNumber);
$userNumber = (int)$userNumber;
$find = 0;
$counter = 0;
for ($i = $min; $i < $max; $i++){
    $find = $userNumber % 10;
    $userNumber = $userNumber / 10;
    if ($find == $userFindNumber) {
        $counter++;
    }
}
echo " ".$counter." раз!";