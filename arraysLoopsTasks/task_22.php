<?php
/*
23. Вам нужно разработать программу, которая считала бы сумму
цифр числа введенного пользователем. Например: есть число 123,
то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.
По желанию можете сделать проверку на корректность введения данных пользователем.
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
