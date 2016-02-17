<?php
/**
Создать текстовый файл, в котором будет 10 строк.
В первой строке записать 1, во второй 22, в третьей 33, ...,
в десятой - десять десяток
 */
$min = 1;
$max = 10;

$f = fopen('test.txt', 'w');

for ($i = $min; $i <= $max; $i++) {
    for ($j = $min; $j <= $i; $j++) {
        fwrite($f, $i);
    }
    fwrite($f, PHP_EOL);
}
fclose($f);

echo file_get_contents('test.txt');

