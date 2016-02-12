<?php
// 13. Вывести таблицу умножения
$min = 2;
$max = 9;
$result = 1;
for($i=$min; $i <= $max; $i++)
{
    for($j=$min; $j <= $max; $j++)
    {
        $result = $i * $j;
        echo "$i * $j = $result";
        echo '<br>';
    }
    echo '<br>';
}