<?php
//19. Выведите результат сравнения $a и $b из п.17 с помощью var_dump.
    $a = '100';
    $b = 100;
    if ((int)$a == $b)
    {
        echo 'Переменная a=';
        var_dump($a);
        echo ' и переменная b=';
        var_dump($b);
        echo ' равны';
    } else echo 'переменные не равны';
?>