<?php
/**
 * Вычислить значение выражения: false && true || false && true || !false && true
 * Вывести на экран true/false в зависимости о того, делится переменная $x на 2 или нет.
 */
var_dump(false && true || false && true || !false && true);
echo "<br>";

$userValue = 101;
if ($userValue % 2 == 0){
    echo "true";
} else {
    echo "false";
}